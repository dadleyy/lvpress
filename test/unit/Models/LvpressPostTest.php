<?php

class LvpressPostTest extends TestCase {

  public function testPostByCategory() {
    $posts = LvpressPost::all();
    $this->assertTrue(count($posts) === 2);
  }

}

?>
