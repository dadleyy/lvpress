<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordpressWpUsers extends Migration {

  public function up() {
    Schema::create('wp_users', function($table) {
      $table->bigIncrements('ID');
      $table->string('user_login', 60);
      $table->string('user_pass', 64);
      $table->string('user_nicename', 50);
      $table->string('user_email', 100);
      $table->string('user_url', 100)->default('');
      $table->dateTime('user_registered');
      $table->string('user_activation_key', 60)->default('');
      $table->integer('user_status');
      $table->string('display_name', 250);
    });
  }

  public function down() {
    Schema::drop('wp_users');
  }

}
