<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Str;

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

  public function categories() {
    $categories = array();
    $post_id = $this->ID;

    $related_taxonomies = LvpressTermTaxonomy::where('taxonomy', 'category')->whereHas('relationships', function($q) use ($post_id) {
      $q->where('object_id', $post_id);
    })->get();

    foreach($related_taxonomies as $taxonomy){ 
      $categories[] = $taxonomy->term()->first();
    }

    return $categories;
  } 

}

?>
