<?php

namespace App\Services;

use App\Exceptions\Validation as ValidationError;

class Validation
{
    static public function registration($firstName, $lastName, $email, $password, $profilePic): void
    {
        $errors = [];

        if (empty(trim($firstName)) || empty(trim($lastName))) {
            $errors[] = "First name or Last Name cannot be empty";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid Email";
        }

        if (empty($password) && (strlen($password) < 8)) {
            $errors[] = "Invalid Password";
        }

        if (empty($profilePic)) {
            $errors[] = "Invalid Profile Picture";
        }

        if (!empty($errors)) {
            throw new ValidationError(implode(", ", $errors));
        }
    }
}
