<?php

class LvpressPostTest extends TestCase {

  public function testPostTaxonomies() {
    $post = LvpressPost::find(1);
    $this->assertTrue(count($post->taxonomies()->get()) === 1);
    $post = LvpressPost::find(2);
    $this->assertTrue(count($post->taxonomies()->get()) === 0);
  }

}

?>
