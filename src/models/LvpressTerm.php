<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class LvpressTerm extends Eloquent {

  protected $table = 'wp_terms';
  protected $guarded = array();
  protected $primaryKey = 'term_id';
  public $timestamps = false;

  public function taxonomy() {
    return $this->hasMany('LvpressTermTaxonomy', 'term_id', 'term_id');
  }

}

?>
