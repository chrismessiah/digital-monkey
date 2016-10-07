<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Blogpost extends Model {
  
  protected $fillable = [
      'title',
      'intro',
      'body',
      'image_name',
  ];
  
  public function check_if_author() {
    if ( Auth::check() ) {
      if ( $this->author->id == Auth::user()->id || Auth::user()->is_admin ) {
        return true;
      }
    }
    return false;
  }
  
  public function author() {
    return $this->belongsTo('App\User', 'user_id', 'id');
  }
  
  public function category() {
    return $this->belongsTo('App\Category', 'category_id', 'id');
  }
  
}
