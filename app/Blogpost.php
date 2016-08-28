<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Blogpost extends Model {
  
  protected $fillable = [
      'title',
      'intro',
      'body',
  ];
  
  public function check_if_author() {
    if ( Auth::check() ) {
      if ( $this->author == Auth::user()->id || Auth::user()->is_admin ) {
        return true;
      }
    }
    return false;
  }
  
  public function author() {
    return $this->belongsTo('App\User', 'author', 'id');
  }
  
  public function category() {
    return $this->belongsTo('App\Category', 'category', 'id');
  }
  
}
