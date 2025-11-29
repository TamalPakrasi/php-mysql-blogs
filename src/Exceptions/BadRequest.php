<?php

namespace App\Exceptions;

use App\Core\CustomException;

class BadRequest extends CustomException {
    public function __construct(string $message)
    {
        return parent::__construct("Bad Request - $message", 400);
    }
}