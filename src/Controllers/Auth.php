<?php

namespace App\Controllers;

use App\Core\Controller;

use App\Services\CSRF;
use App\Services\Auth as AuthServices;

class Auth extends Controller
{
    // @desc   GET getting get-started page
    // @route  GET /get-started
    // @access Private (guest only)
    public function index(): void
    {
        $csrf_token = CSRF::get();
        parent::renderView("auth/index", ["title" => "Get Started", "render_partials" => false, "scripts" => ["form", "getStarted"], "csrf_token" => $csrf_token]);
    }

    // @desc   POST register new user
    // @route  POST /api/auth/register
    // @content-type NOT JSON
    // @access Private (guest only)
    public function register(): void
    {
        [
            "firstName" => $firstName,
            "lastName" => $lastName,
            "email" => $email,
            "password" => $password
        ] = $_POST;

        $profilePic = isset($_FILES['profilePic'])
            ? $_FILES['profilePic']
            : null;

        $res = (new AuthServices($firstName, $lastName, $email, $password, $profilePic))->register();
    }
}
