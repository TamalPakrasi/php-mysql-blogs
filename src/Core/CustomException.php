<?php

namespace App\Core;

use Exception;

class CustomException extends Exception
{
    public function __construct(string $message, int $status)
    {
        parent::__construct($message, $status);
    }
}
