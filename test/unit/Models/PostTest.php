<?php 

use Dadleyy\Lvpress\Models\Post;

class PostTest extends TestCase {

  public function testPostTaxonomies() {
    $post = Post::find(1);
    $this->assertTrue(count($post->taxonomies()->get()) === 2);
    $post = Post::find(2);
    $this->assertTrue(count($post->taxonomies()->get()) === 0);
  }

  public function testGetCategories() {
    $categories = Post::find(1)->categories('project');
    $this->assertTrue(count($categories) === 2);
    $expected = array('uncategorized', 'project');
    foreach($categories as $index => $category) {
      $this->assertEquals($category->slug, $expected[$index]);
    }
  }

}

?>
