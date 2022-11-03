<?php

namespace App\config;

use PDO;

class database
{

  private static $pdo;

  public static function connect()
  {

    try {
      if (empty(self::$pdo)) {
        self::$pdo = new PDO("mysql:host=localhost;dbname=teste", "root", "", [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);
      }

      return self::$pdo;
    } catch (\PDOException $th) {
      var_dump($th);
    }
  }
}
