<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Blogpost;

class BlogpostController extends Controller {

    public function show_one($id) {
      $blogpost = Blogpost::all();
      return $blogpost;
    }
}
