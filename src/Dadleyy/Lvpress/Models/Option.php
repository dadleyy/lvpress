<?php namespace Dadleyy\Lvpress\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Option extends Eloquent {

  protected $table = 'wp_options';
  protected $guarded = array();
  public $timestamps = false;

}

?>
