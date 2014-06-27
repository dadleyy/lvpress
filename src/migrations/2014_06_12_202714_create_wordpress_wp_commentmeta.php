<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordpressWpCommentmeta extends Migration {

  public function up() {
    Schema::create('wp_commentmeta', function($table) {
      $table->bigIncrements('meta_id');
      $table->bigInteger('comment_id')->default(0);
      $table->string('meta_key', 255);
      $table->longText('meta_value');
    });
  }

  public function down() {
    Schema::drop('wp_commentmeta');
  }

}
