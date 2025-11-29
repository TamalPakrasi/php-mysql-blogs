<?php

namespace App\Core;

use mysqli_stmt;

use App\Config\Database as Connection;
use App\Exceptions\Database as DbError;

abstract class Model
{
  protected mysqli_stmt $stmt;
  protected string $sql;

  public function __construct()
  {
    Connection::set();
  }

  protected function prepare(): void
  {
    $conn = Connection::get();

    $this->stmt = $conn->prepare($this->sql);

    if (!$this->stmt) {
      throw new DbError("Failed to prepare statement");
    }
  }

  protected function exec(): void
  {
    if (!$this->stmt->execute()) {
      throw new DbError("Failed to execute query");
    }
  }

  protected function close(): void
  {
    if ($this->stmt) {
      $this->stmt->close();
    }
  }
}
