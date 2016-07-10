<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//use Log;
use App\Http\Requests;
use App\Blogpost;

class BlogpostController extends Controller {

    public function show_all() {
        $blogposts = Blogpost::all();
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
      return view('blogpost', compact('image_name','title', 'intro', 'body', 'created_at', 'updated_at'));
    }
}
