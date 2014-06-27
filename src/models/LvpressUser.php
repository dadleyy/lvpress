<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class LvpressUser extends Eloquent {

  protected $table = 'wp_users';
  protected $guarded = array();
  protected $hidden = array('user_pass');
  public $timestamps = false;

}
