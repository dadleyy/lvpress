<?php namespace Dadleyy\Lvpress\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Meta extends Eloquent {

  protected $table = 'wp_usermeta';
  protected $guarded = array();
  public $timestamps = false;

}

?>
