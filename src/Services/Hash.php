<?php

namespace App\Services;

use App\Exceptions\BadRequest;

class Hash
{
    static public function hash(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    static public function verify(string $hashPass, string $pass)
    {
        $isVerified = password_verify($pass, $hashPass);

        if (!$isVerified) {
            throw new BadRequest("Email or Password is invalid");
        }
    }
}
