<?php namespace Dadleyy\Lvpress;

use Illuminate\Support\ServiceProvider;

class LvpressServiceProvider extends ServiceProvider {

  protected $defer = false;

  public function boot() {
    $this->package('dadleyy/lvpress');
  }

  public function register() {
  }

  public function provides() {
    return array();
  }

}
