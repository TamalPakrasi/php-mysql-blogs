<?php

namespace App\Exceptions;

use App\Core\CustomException;

class NotAllowed extends CustomException {
    public function __construct(string $message = "Invalid Request Method") {
        parent::__construct($message, 405);
    }
}