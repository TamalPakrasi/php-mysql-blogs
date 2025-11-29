<?php

namespace App\Exceptions;

use App\Core\CustomException;

class Conflict extends CustomException {
    public function __construct(string $message = "Email Already Exists")
    {
        return parent::__construct("Conflict - $message", 409);
    }
}