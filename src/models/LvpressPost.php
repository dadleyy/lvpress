<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class LvpressPost extends Eloquent {

  protected $table = 'wp_posts';
  protected $guarded = array();
  public $timestamps = false;
  protected $primaryKey = 'ID';

  public function author() {
    return $this->hasOne('LvpressUser', 'ID', 'post_author');
  }

  public function taxonomies() {
    return $this->belongsToMany('LvpressTermTaxonomy', 'wp_term_relationships', 'object_id', 'term_taxonomy_id');
  }

}

?>
