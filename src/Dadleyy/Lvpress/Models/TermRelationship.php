<?php namespace Dadleyy\Lvpress\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TermRelationship extends Eloquent {

  protected $table = 'wp_term_relationships';
  protected $guarded = array();
  public $timestamps = false;

}

?>
