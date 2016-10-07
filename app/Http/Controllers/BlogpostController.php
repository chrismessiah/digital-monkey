<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//use Log;
use App\Http\Requests;
use App\Blogpost;
use Intervention\Image\ImageManagerStatic as Image;
use App\Category;
use App\User;
use Auth;
use App\Helpers\Helper;

class BlogpostController extends Controller {
    
    public function __construct() {
        $this->middleware('auth', ['only' => ['store', 'destroy', 'create', 'update']]);
    }
    
    private function popper($i2, $to_pop, $direction) {
        if ($direction === "f") {$to_pop = $to_pop->reverse();}
        for ($i=0; $i < $i2; $i++) { 
            $to_pop->pop();
        }
        if ($direction === "f") {$to_pop = $to_pop->reverse();}
        return $to_pop;
    }

    public function show_all() {
        $blogposts = Blogpost::with(['author', 'category'])->orderBy('updated_at', 'desc')->get();
        $banners = $blogposts->take(5);
        $blogposts = $this->popper(5, $blogposts, "f"); 
        $popular_posts = $blogposts->take(-5); // should be most popular but what the heck...
        $blogposts = $this->popper(5, $blogposts, "l");
        $blogpost_list = $blogposts->take(4); // should be whole list but no infinite-scroll is implemented so 4 is enough for now
        $categories = Category::all();
        return view('index', compact('banners', 'popular_posts', 'blogpost_list', 'categories'));
    }
    
    public function edit($id) {
        $blogpost = Blogpost::with(['author', 'category'])->find($id);
        $categories = Category::all();
        if ( !$blogpost->check_if_author() ) {
            // send $error messange here
            return redirect()->to( Helper::env_url('blogposts/'.$blogpost->id) );
        }
        $request_type = "PATCH";
        $form_route = "blogposts/".$blogpost->id;
        $button_text = "Update!";
        $blogpost = $this->sanitize_blogpost($blogpost);
        return view('blogpost.write', compact('blogpost', 'request_type', 'form_route', 'button_text', 'categories'));
    }
    
    public function write() {
        $blogpost = new Blogpost();
        $categories = Category::all();
        $blogpost->category = new Category();
        $blogpost->category->name = 'Choose a category!';
        $blogpost->title = 'Add a title here!';
        $blogpost->intro = 'I\'m the intro!';
        $blogpost->body = 'I\'m the body!';
        
        $request_type = "POST";
        $form_route = "blogposts";
        $button_text = "Post!";
        $blogpost = $this->sanitize_blogpost($blogpost);
        return view('blogpost.write', compact('blogpost', 'request_type', 'form_route', 'button_text', 'categories'));
    }
    
    private function validate_blogpost_request(Request $request){
        $this->validate($request, [
            'title' => 'required|min:3|max:50',
            'intro' => 'required|min:3|max:160',
            'body' => 'required|min:3|max:4000',
            'file' => 'file|image|max:15000',
        ]);
    }
    
    public function update(Request $request, $id) {
        $this->validate_blogpost_request($request);
        
        $blogpost = Blogpost::find($id);
        if ( !$blogpost->check_if_author() ) {
            //return redirect()->to( Helper::env_url('blogposts/'.$blogpost->id) );
        }
        $blogpost->title = $request->input('title');
        $blogpost->intro = $request->input('intro');
        $blogpost->body = $request->input('body');
        if ($request->hasFile('file')) {
            $blogpost->image_name = $this->image_upload($request, 'file', $blogpost->id);
        }
        $blogpost->category_id = $this->get_categoryID_by_name($request->category);
        $blogpost->save();
        return redirect()->to( Helper::env_url('blogposts/'.$blogpost->id) );
    }
    
    private function sanitize_blogpost($blogpost) {
        $blogpost->title = strip_tags($blogpost->title);
        $blogpost->intro = strip_tags($blogpost->intro);
        //$blogpost->body = nl2br($blogpost->body);
        $blogpost->body = strip_tags($blogpost->body, '<strong><em><ins><sub><sup><blockquote><h1><h2><h3><b><i><pre><a><p>');
        return $blogpost;
    }

    public function show($id) {
      $blogpost = Blogpost::with('author', 'category')->find($id);
      $blogpost = $this->sanitize_blogpost($blogpost);
      return view('blogpost.read', compact('blogpost'));
    }
    
    private function get_categoryID_by_name($categoryName) {
        $categoryObj = Category::where('name', $categoryName)->first();
        return $categoryObj->id;
    }
    
    public function store(Request $request) {
        $this->validate_blogpost_request($request);
        
        $blogpost = new Blogpost($request->all());
        $blogpost->user_id = Auth::user()->id;
        $blogpost->image_name = $this->image_upload($request, 'file', $blogpost->user_id);
        $blogpost = $this->sanitize_blogpost($blogpost);
        if ($blogpost->category_id) {
            $blogpost->category_id = $this->get_categoryID_by_name($request->category);
        } else {
            $blogpost->category_id = 3;
        }
        $blogpost->save();
        return redirect()->to( Helper::env_url('blogposts/'.$blogpost->id) );
    }
    
    public function destroy(Request $request, $id) {
        $blogpost = Blogpost::find($id);
        if ( !$blogpost->check_if_author() ) {
            return redirect()->to( Helper::env_url('blogposts/'.$blogpost->id) );
        }
        Blogpost::destroy($id);
        return redirect()->to( Helper::env_url('/') );
        
    }
    
    private function image_upload(Request $request, $form_file_naming, $id) {
        $this->validate($request, [$form_file_naming => 'file|image|max:15000']);
        if ($request->hasFile($form_file_naming) && $request->file($form_file_naming)->isValid()) {
            $image = $request->file($form_file_naming);
            if (!app()->isLocal()) {
                $image = $this->image_compress($image, $id);
                $extension = "jpg";
            } else {
                $extension = "png";
            }
            $hash = hash_file('md5', $image);
            $file_name = $hash.'.'.$extension;
            $path = public_path().'/images/articles/';
            $image->move($path, $file_name);
            if (!app()->isLocal()) {
                unlink($image);
            }
            return $file_name;
        }
        return 'dbaec6755e67e7d9c0bfff49c75e451a.png';
    }
    
    private function image_compress($input_image, $id) {   
        Image::configure(array('driver' => 'imagick'));     
        $img = Image::make($input_image);
        $img->resize(2048, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $path = public_path().'/images/articles/'.$id.'.jpg';
        $img->save($path,30);
        return $path;
    }
}
