<?php

namespace App\Middlewares;

use App\Models\Users;

use App\Exceptions\Unauthorized;

class Protect
{
  private array $user;

  public function handle(): void
  {

    if (!isset($_SESSION["isAuthenticated"]) || ($_SESSION["isAuthenticated"] !== true)) {
      throw new Unauthorized();
    }

    if (!isset($_SESSION["user"])) {
      throw new Unauthorized();
    }

    $this->user = $_SESSION["user"];

    $this->checkUser();
  }

  private function checkUser(): void
  {
    $id = (int) $this->user["id"];

    $res = (new Users())->findById($id);

    if (!$res) {
      throw new Unauthorized();
    }
  }
}
