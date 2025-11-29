<?php

namespace App\Exceptions;

use App\Core\CustomException;

class Database extends CustomException
{
  public function __construct(string $message)
  {
    parent::__construct("Database Error - $message", 500);
  }
}
