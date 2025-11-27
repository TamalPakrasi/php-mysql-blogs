<?php

namespace App\Exceptions;

use App\Core\CustomException;

class NotFound extends CustomException {
    public function __construct(string $message = "Page Not Found") {
        parent::__construct($message, 404);
    }
}