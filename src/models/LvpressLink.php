<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class LvpressLink extends Eloquent {

  protected $table = 'wp_links';
  protected $guarded = array();
  public $timestamps = false;

}

?>
