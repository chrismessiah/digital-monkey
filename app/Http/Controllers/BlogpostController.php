<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//use Log;
use App\Http\Requests;
use App\Blogpost;
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
    
    public function create() {
        // if ($id) {
        //     $blogpost = Blogpost::find($id);
        //     if ( !$blogpost->check_if_author() ) {
        //         return redirect()->to( Helper::env_url('blogposst/'.$blogpost->id) );
        //     }
        //     $request_type = "PATCH";
        //     $route = "blogposts/".$blogpost->id;
        // }
        //else {
        $blogpost = new Blogpost();
        $request_type = "POST";
        $route = "blogposts";
        //}
        return view('blogpost.write', compact('blogpost', 'request_type', 'route'));
    }
    
    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required|min:3|max:15',
            'intro' => 'required|min:3|max:60',
            'body' => 'required|min:3|max:2000'
        ]);
        
        $blogpost = Blogpost::find($id);
        if ( !$blogpost->check_if_author() ) {
            return redirect()->to( Helper::env_url('blogposst/'.$blogpost->id) );
        }
        $blogpost->title = $request->input('title');
        $blogpost->intro = $request->input('intro');
        $blogpost->body = $request->input('body');
        if ($request->hasFile('file')) {
            $blogpost->image_name = $this->image_upload($request, 'file');
        }
        $blogpost->save();
        return redirect()->to( Helper::env_url('blogposts/'.$blogpost->id) );
    }

    public function show($id) {
      $blogpost = Blogpost::with('author', 'category')->find($id);
      $blogpost->title = strip_tags($blogpost->title);
      $blogpost->intro = strip_tags($blogpost->intro);
      $unsanitized_body = nl2br($blogpost->body);
      $blogpost->body = strip_tags($unsanitized_body, '<strong><em><ins><sub><sup><br>');
      return view('blogpost.read', compact('blogpost'));
    }
    
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:3|max:15',
            'intro' => 'required|min:3|max:60',
            'body' => 'required|min:3|max:2000'
        ]);
        
        $blogpost = new Blogpost($request->all());
        $blogpost->author = Auth::user()->id;
        $blogpost->image_name = $this->image_upload($request, 'file');
        $blogpost->save();
        return redirect()->to( Helper::env_url('blogposts/'.$blogpost->id) );
    }
    
    public function destroy(Request $request, $id) {
        $blogpost = Blogpost::find($id);
        if ( !$blogpost->check_if_author() ) {
            return redirect()->to( Helper::env_url('blogposst/'.$blogpost->id) );
        }
        Blogpost::destroy($id);
        return redirect()->to( Helper::env_url('/') );
        
    }
    
    private function image_upload(Request $request, $form_file_naming) {
        $this->validate($request, [$form_file_naming => 'file|image|max:4000']);
        if ($request->hasFile($form_file_naming) && $request->file($form_file_naming)->isValid()) {
            $image = $request->file($form_file_naming);
            $extension = $image->getClientOriginalExtension();
            $hash = hash_file('md5', $image);
            $file_name = $hash.'.'.$extension;
            $path = public_path().'/images/blog_banners/';
            $image->move($path, $file_name);
            return $file_name;
        }
        return 'dbaec6755e67e7d9c0bfff49c75e451a.png';
    }
}
