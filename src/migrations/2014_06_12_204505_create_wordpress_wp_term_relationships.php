<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordpressWpTermRelationships extends Migration {

  public function up() {
    Schema::create('wp_term_relationships', function($table) {
      $table->bigInteger('object_id')->default(0);
      $table->bigInteger('term_taxonomy_id')->default(0);
      $table->integer('term_order')->default(0);
    });
  }

  public function down() {
    Schema::drop('wp_term_relationships');
  }

}
