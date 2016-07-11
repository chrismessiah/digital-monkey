<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//use Log;
use App\Http\Requests;
use App\Blogpost;
use Auth;

class BlogpostController extends Controller {
    
    public function __construct() {
        $this->middleware('auth', ['only' => ['publish']);
    }

    public function show_all() {
        $blogposts = Blogpost::all()->sortByDesc("updated_at");
        return view('index', compact('blogposts'));
    }

    public function show_one($id) {
      $blogpost = Blogpost::find($id);
      $author_id = $blogpost->author;
      
      $image_name = $blogpost->image_name;
      $title = strip_tags($blogpost->title);
      $intro = strip_tags($blogpost->intro);
      $unsanitized_body = nl2br($blogpost->body);
      $body = strip_tags($unsanitized_body, '<strong><em><ins><sub><sup><br>');
      $created_at = $blogpost->created_at;
      $updated_at = $blogpost->updated_at;
      return view('blogpost.read', compact('image_name','title', 'intro', 'body', 'created_at', 'updated_at'));
    }
    
    public function publish(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:3|max:15',
            'intro' => 'required|min:3|max:25',
            'body' => 'required|min:3|max:1000'
        ]);
        
        $blogpost = new Blogpost($request->all());
        $blogpost->author = Auth::user()->id;
        $blogpost->image_name = 'dbaec6755e67e7d9c0bfff49c75e451a.png';
        $blogpost->save();
        return redirect()->to( url('/blogpost/read/'.$blogpost->id) );
    }
}
