<?php

namespace App\Controllers;

use App\Core\Controller;

use App\Services\CSRF;

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
}
