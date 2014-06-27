<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class LvpressUserMeta extends Eloquent {

  protected $table = 'wp_usermeta';
  protected $guarded = array();
  public $timestamps = false;

}

?>
