<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordpressWpTermTaxonomy extends Migration {

  public function up() {
    Schema::create('wp_term_taxonomy', function($table) {
      $table->bigIncrements('term_taxonomy_id');
      $table->bigInteger('term_id')->default(0);
      $table->string('taxonomy', 32);
      $table->longText('description');
      $table->bigInteger('parent')->default(0);
      $table->bigInteger('count')->default(0);
    });
  }

  public function down() {
    Schema::drop('wp_term_taxonomy');
  }

}
