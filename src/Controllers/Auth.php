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

        (new AuthServices(trim($email), trim($password), trim($firstName), trim($lastName),  $profilePic))->register();

        $_SESSION["message"] = "New user registered and logged in successfully";

        sendResponse(201, $_SESSION["message"]);
    }

    // @desc   POST loggin in existing user
    // @route  POST /api/auth/login
    // @content-type JSON
    // @access Private (guest only)
    public function login(): void
    {
        [
            "email" => $email,
            "password" => $password
        ] = $_POST;

        (new AuthServices(trim($email), trim($password)))->login();

        $_SESSION["message"] = "User logged in successfully";

        sendResponse(200, $_SESSION["message"]);
    }

    // @desc   POST logging out user
    // @route  POST /api/auth/logout
    // @access Private (auth user)
    public function logout(): void
    {
        session_unset();
        session_destroy();

        setcookie("PHPSESSID", "", time() - 3600, BASE_URL . "/");

        session_start();

        $_SESSION["message"] = "User logged out successfully";

        sendResponse(200, $_SESSION["message"]);
    }
}
