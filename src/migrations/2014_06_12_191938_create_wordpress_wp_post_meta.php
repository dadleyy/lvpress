<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordpressWpPostMeta extends Migration {

	public function up() {
    Schema::create('wp_postmeta', function($table) {
      $table->bigIncrements('meta_id');
      $table->bigInteger('post_id');
      $table->string('meta_key', 255);
      $table->longText('meta_value');
    });
  }

	public function down() {
    Schema::drop('wp_postmeta');
  }
   
}
