<?php

namespace App\Exceptions;

use App\Core\CustomException;

class Forbidden extends CustomException {
    public function __construct(string $message = "cannot access this")
    {
        return parent::__construct("Forbidden - $message", 403);
    }
}