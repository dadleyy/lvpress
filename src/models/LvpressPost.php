<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class LvpressPost extends Eloquent {

  protected $table = 'wp_posts';
  protected $guarded = array();
  public $timestamps = false;

  public function author() {
    return $this->hasOne('LvpressUser', 'ID', 'post_author');
  }

}

?>
