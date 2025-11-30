<?php

namespace App\Services;

use App\Exceptions\Unauthorized;

class CSRF
{
    static public function get(): string
    {
        if (isset($_SESSION["csrf_token"])) unset($_SESSION['csrf_token']);
        $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
        return $_SESSION["csrf_token"];
    }

    static public function verify(string $token): void
    {
        if (!isset($_SESSION["csrf_token"])) {
            throw new Unauthorized("Token missing");
        }

        if (!hash_equals($_SESSION["csrf_token"], $token)) {
            throw new Unauthorized("Token invalid");
        }

        unset($_SESSION["csrf_token"]);
    }
}
