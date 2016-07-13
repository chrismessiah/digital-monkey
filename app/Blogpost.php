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
  
}
