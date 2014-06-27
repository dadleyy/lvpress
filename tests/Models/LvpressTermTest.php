<?php

use Illuminate\Database\Query\Builder;

class LvpressTermTest extends TestCase {

  private $term;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();

    $default_terms = array('uncategorized', 'project', 'blogpost');
    foreach($default_terms as $index=>$term) {
      $wp_term = new LvpressTerm;
      $wp_term->name = ucfirst($term);
      $wp_term->slug = $term;
      $saved = $wp_term->save();

      DB::table('wp_term_taxonomy')->insert(array(
        'term_id' => $index + 1,
        'taxonomy' => 'category',
        'description' => ''
      ));
    }
  }

  public function setUp() {
    parent::setUp();
    $this->term = LvpressTerm::find(1);
  }

  public function testTermSelect() {
    $this->assertTrue($this->term->slug == 'uncategorized');
  }

  public function testTaxonomySelect() {
    $taxonomy = $this->term->taxonomy()->first();
    $this->assertTrue($taxonomy->taxonomy === 'category');
  }

  public function testTaxonomyInsert() {
    $taxonomy = new LvpressTermTaxonomy;
    $taxonomy->taxonomy = 'stuff';
    $taxonomy->save();

    $associate = $this->term->taxonomy()->save($taxonomy);

    $select = DB::table('wp_term_taxonomy')
      ->where('term_id', '=', $this->term->term_id)
      ->get();

    $this->assertTrue(count($select) === 2);
  }

  public function testTaxonomyEagerSelect() {
    $cat = "category";
    $new_term = new LvpressTerm;
    $new_term->save();

    $category_count = LvpressTerm::whereHas('taxonomy', function($q) {
      $q->where('taxonomy', 'category');
    })->count();

    $term_count = count(LvpressTerm::all());
    $this->assertTrue($term_count !== $category_count);

    $new_term->delete();
  }

  public function tearDown() {
    parent::tearDown();
    $taxonomy = LvpressTermTaxonomy::where('taxonomy', '=', 'stuff')->first();
    if($taxonomy !== null)
      $taxonomy->delete();
  }


}
