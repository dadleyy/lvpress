<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordpressWpComments extends Migration {

  public function up() {
    Schema::create('wp_comments', function($table) {
      $table->bigIncrements('comment_ID');
      $table->bigInteger('comment_post_ID')->default(0);
      $table->string('comment_author', 10);
      $table->string('comment_author_email', 100);
      $table->string('comment_author_url', 200);
      $table->string('comment_author_IP', 100);
      $table->dateTime('comment_date');
      $table->dateTime('comment_date_gmt');
      $table->text('comment_content');
      $table->integer('comment_karma')->default(0);
      $table->string('comment_approved', 20)->default('1');
      $table->string('comment_agent', 255);
      $table->string('comment_type', 20);
      $table->bigInteger('comment_parent')->default(0);
      $table->bigInteger('user_id')->default(0);
    });
  }

  public function down() {
    Schema::drop('wp_comments');
  }

}
