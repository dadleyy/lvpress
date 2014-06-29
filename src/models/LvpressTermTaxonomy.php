<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class LvpressTermTaxonomy extends Eloquent {
  
  protected $table = 'wp_term_taxonomy';
  protected $guarded = array();
  public $timestamps = false;
  protected $primaryKey = 'term_taxonomy_id';

  public function term() {
    return $this->hasOne('LvpressTerm', 'term_id');
  }

  public function relationships() {
    return $this->hasMany('LvpressTermRelationship', 'term_taxonomy_id', 'term_taxonomy_id');
  }

}

?>
