<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model {
  
  protected $fillable = [
      'title',
      'intro',
      'body',
  ];
  
  public function check_if_author($user) {
    if ( ($this->author == $user->id) || $user->is_admin ) {
      return true;
    }
    return false;
  }
  
}
