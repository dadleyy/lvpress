<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordpressWpUsermeta extends Migration {

  public function up() {
    Schema::create('wp_usermeta', function($table) {
      $table->bigIncrements('umeta_id');
      $table->bigInteger('user_id');
      $table->string('meta_key', 255);
      $table->longText('meta_value');
    });
  }

  public function down() {
    Schema::drop('wp_usermeta');
  }

}
