<?php

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\DatabaseMigrationRepository;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class TestCase extends PHPUnit_Framework_TestCase {

  protected static function createFixtures($fixture_name, $fixtures) {
    foreach($fixtures as $fixture) {
      $class = "Dadleyy\\Lvpress\\Models\\$fixture_name";
      $f = new $class($fixture);
      $f->save();
    }
  }

  protected static function loadFixtures() {
    $system = new Filesystem;
    foreach($system->files(__DIR__.'/../fixtures') as $file) {
      $fixture_name = Str::singular(basename($file, '.php'));
      $fixtures = require $file;
      static::createFixtures($fixture_name, $fixtures);
    }
  }

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    $config = require __DIR__.'/../config.php';

    $capsule = new Manager;
    $capsule->addConnection($config);
    $capsule->bootEloquent();
  
    Schema::setConnection($capsule->getConnection('default'));
    DB::setConnection($capsule->getConnection('default'));

    // run the migrations
    $migration_repo = new DatabaseMigrationRepository(Model::getConnectionResolver(), 'migrations');
    if(!$migration_repo->repositoryExists())
      $migration_repo->createRepository();

    $migrator = new Migrator($migration_repo, Model::getConnectionResolver(), new Filesystem);
    $migrator->rollback();
    $migrator->run(__DIR__.'/../../src/migrations');

    static::loadFixtures();
  }

}

?>
