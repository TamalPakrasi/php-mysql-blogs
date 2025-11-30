<?php

namespace App\Exceptions;

use App\Core\CustomException;

class Unauthorized extends CustomException
{
  public function __construct(string $message = "Log in to access this resource")
  {
    parent::__construct("Unauthorized - $message", 401);
  }
}
