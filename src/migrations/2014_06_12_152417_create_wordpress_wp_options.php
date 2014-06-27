<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordpressWpOptions extends Migration {

  public function up() {
    Schema::create('wp_options', function($table) {
      $table->bigIncrements('option_id');
      $table->string('option_name', 64);
      $table->longText('option_value');
      $table->string('autoload', 20);
    });
  }

  public function down() {
    Schema::drop('wp_options');
  }

}
