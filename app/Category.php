<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
  public function blogposts() {
    return $this->hasMany('App\Blogpost', 'id', 'category');
  }
}
