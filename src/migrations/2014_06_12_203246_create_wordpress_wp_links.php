<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordpressWpLinks extends Migration {

  public function up() {
    Schema::create('wp_links', function($table) {
      $table->bigIncrements('link_id');
      $table->string('link_url', 255);
      $table->string('link_name', 255);
      $table->string('link_image', 255);
      $table->string('link_target', 25);
      $table->string('link_description', 255);
      $table->string('link_visible', 20)->default('Y');
      $table->bigInteger('link_owner')->default(1);
      $table->integer('link_rating')->default(0);
      $table->dateTime('link_updated');
      $table->string('link_rel', 255);
      $table->mediumText('link_notes');
      $table->string('link_rss', 255);
    });
  }

  public function down() {
    Schema::drop('wp_links');
  }

}
