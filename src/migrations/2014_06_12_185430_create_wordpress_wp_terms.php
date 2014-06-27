<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordpressWpTerms extends Migration {

  public function up() {
    Schema::create('wp_terms', function($table) {
      $table->bigIncrements('term_id');
      $table->string('name', 200);
      $table->string('slug', 200);
      $table->bigInteger('term_group')->default(0);
    });
  }

  public function down() {
    Schema::drop('wp_terms');
  }
}
