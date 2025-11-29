<?php

namespace App\Middlewares;

use App\Core\Router;
use App\Exceptions\Forbidden;

class Guest
{
    public function handle(): void
    {
        if (isset($_SESSION["isAuthenticated"])) {
            $msg = "Logged in users cannot access this";

            if (str_contains($_SERVER["REQUEST_URI"], "/api/"))  throw new Forbidden($msg);
            else Router::redirect("/", $msg);
        }
    }
}
