<?php

class DB {

  protected static $connection;

  public static function setConnection($connection) {
    static::$connection = $connection;
  }

  public static function table($table_name) {
    return static::$connection->table($table_name);
  }

}

?>
