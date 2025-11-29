<?php

namespace App\Exceptions;

use App\Core\CustomException;

class Validation extends CustomException {
    public function __construct(string $message)
    {
        return parent::__construct("Validation Failed - $message", 400);
    }
}