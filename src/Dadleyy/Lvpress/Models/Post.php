<?php namespace Dadleyy\Lvpress\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Dadleyy\Lvpress\Models\TermTaxonomy;

class Post extends Eloquent {

  protected $table = 'wp_posts';
  protected $guarded = array();
  public $timestamps = false;
  protected $primaryKey = 'ID';

  public function author() {
    return $this->hasOne('Dadleyy\Lvpress\Models\User', 'ID', 'post_author');
  }

  public function taxonomies() {
    return $this->belongsToMany('Dadleyy\Lvpress\Models\TermTaxonomy', 'wp_term_relationships', 'object_id', 'term_taxonomy_id');
  }

  public function categories() {
    $categories = array();
    $post_id = $this->ID;

    $related_taxonomies = TermTaxonomy::where('taxonomy', 'category')->whereHas('relationships', function($q) use ($post_id) {
      $q->where('object_id', $post_id);
    })->get();

    foreach($related_taxonomies as $taxonomy){ 
      $categories[] = $taxonomy->term()->first();
    }

    return $categories;
  } 

}

?>
