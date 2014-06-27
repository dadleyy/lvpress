<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class LvpressPost extends Eloquent {

  protected $table = 'wp_posts';
  protected $guarded = array();
  public $timestamps = false;

  public static function findBySlug($slug) {
    $ret = null;
    foreach(static::all() as $post) {
      $post_slug = $post->getUrlSlug();

      if($slug === $post_slug)
        $ret = $post;
    }
    return $ret;
  }

  public static function projects() {
    return static::byCategory('project');
  }

  private static function byCategory($category) {
    return DB::table('wp_posts')
      ->join('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_posts.ID')
      ->join('wp_term_taxonomy', 'wp_term_taxonomy.term_taxonomy_id', '=', 'wp_term_relationships.term_taxonomy_id')
      ->join('wp_terms', 'wp_term_taxonomy.term_id', '=', 'wp_terms.term_id')
      ->where('wp_terms.slug', '=', $category)
      ->get();
  }

  public function author() {
    return $this->hasOne('LvpressUser', 'ID', 'post_author');
  }

  public function getUrlSlug() {
    $title = $this->post_title;
    $lower = strtolower($title);
    $chars = preg_replace('/[^\w\s]/', '', $lower);
    return preg_replace('/\s/', '-', $chars);
  }

}

?>
