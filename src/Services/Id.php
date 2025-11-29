<?php

namespace App\Services;

use Ramsey\Uuid\Uuid;

class Id
{
  static public function get(): string
  {
    $uuid = Uuid::uuid4()->toString();
    return str_replace("-", "", $uuid);
  }
}
