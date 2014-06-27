<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordpressWpPosts extends Migration {

  public function up() {
    Schema::create('wp_posts', function($table) {
      $table->bigIncrements('ID');
      $table->bigInteger('post_author')->default(0);
      $table->dateTime('post_date');
      $table->dateTime('post_date_gmt');
      $table->longText('post_content')->nullable();
      $table->text('post_title')->nullable();
      $table->text('post_excerpt')->nullable();
      $table->string('post_status', 20)->default('publish');
      $table->string('comment_status', 20)->default('open');
      $table->string('ping_status', 20)->default('open');
      $table->string('post_password', 20)->default('');
      $table->string('post_name', 200)->default('');
      $table->text('to_ping')->nullable();
      $table->text('pinged')->nullable();
      $table->dateTime('post_modified');
      $table->dateTime('post_modified_gmt');
      $table->longText('post_content_filtered')->nullable();
      $table->bigInteger('post_parent')->default(0);
      $table->string('guid', 255);
      $table->integer('menu_order');
      $table->string('post_type', 20)->default('post');
      $table->string('post_mime_type', 100)->default('');
      $table->bigInteger('comment_count')->default(0);
    });
  }

  public function down() {
    Schema::drop('wp_posts');
  }

}
