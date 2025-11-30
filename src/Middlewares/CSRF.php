<?php

namespace App\Middlewares;

use App\Exceptions\Unauthorized;
use App\Services\CSRF as ServicesCSRF;

class CSRF
{
  public function handle(): void
  {
    if (!isset($_POST["token"])) {
      throw new Unauthorized("Token Missing");
    }

    ServicesCSRF::verify($_POST["token"]);
  }
}
