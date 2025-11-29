<?php

namespace App\Services;

class Hash {
    static public function hash(string $password) : string {
       return password_hash($password, PASSWORD_DEFAULT);
    }
}