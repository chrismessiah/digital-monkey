<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//use Log;
use App\Http\Requests;
use App\Blogpost;
use App\User;
use Auth;
use App\Helpers\Helper;

class BlogpostController extends Controller {
    
    public function __construct() {
        $this->middleware('auth', ['only' => ['store', 'destroy', 'create', 'update']]);
    }

    public function show_all() {
        $blogposts = Blogpost::all()->sortByDesc("updated_at");
        return view('index', compact('blogposts'));
    }
    
    public function create($id) {
        if ($id) {
            $blogpost = Blogpost::find($id);
            if ( !$blogpost->check_if_author(Auth::user()) ) {
                return redirect()->to( Helper::env_url('blogposst/'.$blogpost->id) );
            }
            $request_type = "PATCH";
            $route = "blogposts/".$blogpost->id;
        } else {
            $blogpost = new Blogpost();
            $request_type = "POST";
            $route = "blogposts";
        }
        return view('blogpost.write', compact('blogpost', 'request_type', 'route'));
    }
    
    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required|min:3|max:15',
            'intro' => 'required|min:3|max:60',
            'body' => 'required|min:3|max:2000'
        ]);
        
        $blogpost = Blogpost::find($id);
        if ( !$blogpost->check_if_author(Auth::user()) ) {
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
      $blogpost = Blogpost::find($id);
      $id = $blogpost->id;
      $author = User::find($blogpost->author);
      $image_name = $blogpost->image_name;
      $title = strip_tags($blogpost->title);
      $intro = strip_tags($blogpost->intro);
      $unsanitized_body = nl2br($blogpost->body);
      $body = strip_tags($unsanitized_body, '<strong><em><ins><sub><sup><br>');
      $created_at = $blogpost->created_at;
      $updated_at = $blogpost->updated_at;
      return view('blogpost.read', compact('id','image_name','author','title', 'intro', 'body', 'created_at', 'updated_at'));
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
        if ( !$blogpost->check_if_author(Auth::user()) ) {
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
