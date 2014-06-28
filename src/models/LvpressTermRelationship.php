<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class LvpressTermRelationship extends Eloquent {

  protected $table = 'wp_term_relationships';
  protected $guarded = array();
  public $timestamps = false;

}

?>
