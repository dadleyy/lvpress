<?php

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\DatabaseMigrationRepository;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Filesystem\Filesystem;

class TestCase extends PHPUnit_Framework_TestCase {

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();

    $capsule = new Manager;
    $sql_config = array(
      'driver' => 'mysql', 
      'host' => '127.0.0.1', 
      'database' => 'dadleyy_test', 
      'username' => 'dadleyy_test', 
      'password' => 'password', 
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix' => ''
    );
    $capsule->addConnection($sql_config);
    $capsule->bootEloquent();
  
    Schema::setConnection($capsule->getConnection('default'));
    DB::setConnection($capsule->getConnection('default'));

    // run the migrations
    $migration_repo = new DatabaseMigrationRepository(Model::getConnectionResolver(), 'migrations');
    if(!$migration_repo->repositoryExists())
      $migration_repo->createRepository();

    $migrator = new Migrator($migration_repo, Model::getConnectionResolver(), new Filesystem);
    $migrator->rollback();
    $migrator->run(__DIR__.'/../src/migrations');
  }

}

?>
