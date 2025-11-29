<?php

namespace App\Config;

use App\Exceptions\Database as DbError;
use mysqli;

class Database
{
  static private ?mysqli $conn = null;

  static public function set(): void
  {
    if (empty(self::$conn)) {
      self::$conn = new mysqli(
        $_ENV["DB_HOST"],
        $_ENV["DB_USER"],
        $_ENV["DB_PASS"],
        $_ENV["DB_NAME"]
      );

      if (self::$conn->connect_error) {
        throw new DbError("Failed to connect DB " . self::$conn->connect_error);
      }
    }
  }

  static public function get(): mysqli
  {
    return self::$conn;
  }
}
