<?php

namespace App\Services;

class CSRF
{
    static public function get(): string
    {
        if (isset($_SESSION["csrf_token"])) unset($_SESSION['csrf_token']);
        $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
        return $_SESSION["csrf_token"];
    }
}
