<?php

use Dadleyy\Lvpress\Models\Term;
use Dadleyy\Lvpress\Models\TermTaxonomy;

class TermTest extends TestCase {

  private $term;

  public function setUp() {
    parent::setUp();
    $this->term = Term::find(1);
  }

  public function testTermSelect() {
    $this->assertTrue($this->term->slug == 'uncategorized');
  }

  public function testTaxonomySelect() {
    $taxonomy = $this->term->taxonomy()->first();
    $this->assertTrue($taxonomy->taxonomy === 'category');
  }

  public function testTaxonomyInsert() {
    $taxonomy = new TermTaxonomy;
    $taxonomy->taxonomy = 'stuff';
    $taxonomy->description = '';
    $taxonomy->save();

    $associate = $this->term->taxonomy()->save($taxonomy);

    $select = DB::table('wp_term_taxonomy')
      ->where('term_id', '=', $this->term->term_id)
      ->get();

    $this->assertTrue(count($select) === 2);
  }

  public function testTaxonomyEagerSelect() {
    $cat = "category";
    $new_term = new Term;
    $new_term->name = 'somename';
    $new_term->slug = ucfirst('somename');
    $new_term->save();

    $category_count = Term::whereHas('taxonomy', function($q) {
      $q->where('taxonomy', 'category');
    })->count();

    $term_count = count(Term::all());
    $this->assertTrue($term_count !== $category_count);

    $new_term->delete();
  }

  public function tearDown() {
    parent::tearDown();
    $taxonomy = TermTaxonomy::where('taxonomy', '=', 'stuff')->first();
    if($taxonomy !== null)
      $taxonomy->delete();
  }


}
