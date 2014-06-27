<?php

class Schema {

  private static $builder;

  public static function setConnection($connection) {
    static::$builder = $connection->getSchemaBuilder();
  }

  public static function create($table, $fn) {
    static::$builder->create($table, $fn);
  }

  public static function drop($table) {
    static::$builder->drop($table);
  }
}

?>
