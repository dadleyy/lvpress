<?php namespace Dadleyy\Lvpress\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class LvpressTermTaxonomy extends Eloquent {
  
  protected $table = 'wp_term_taxonomy';
  protected $guarded = array();
  public $timestamps = false;
  protected $primaryKey = 'term_taxonomy_id';

  public function term() {
    return $this->hasOne('Dadleyy\Lvpress\Models\LvpressTerm', 'term_id');
  }

  public function relationships() {
    return $this->hasMany('Dadleyy\Lvpress\Models\LvpressTermRelationship', 'term_taxonomy_id', 'term_taxonomy_id');
  }

}

?>
