<?php namespace Dadleyy\Lvpress\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Link extends Eloquent {

  protected $table = 'wp_links';
  protected $guarded = array();
  public $timestamps = false;

}

?>
