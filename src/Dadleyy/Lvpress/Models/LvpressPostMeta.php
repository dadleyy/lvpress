<?php namespace Dadleyy\Lvpress\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class LvpressPostMeta extends Eloquent {

  protected $table = 'wp_postmeta';
  protected $guarded = array();
  public $timestamps = false;

}

?>
