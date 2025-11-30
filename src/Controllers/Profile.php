<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\CSRF;

class Profile extends Controller
{
    // @desc   GET getting My Profile Page
    // @route  GET /profile/me
    // @access Private (auth user / me)
    public function index(): void
    {
        parent::renderView("profile/index", ["title" => "My Profile", "render_partials" => false, "page" => "me", "scripts" => ["form", "edit", "logout"], "csrf_token" => CSRF::get()]);
    }

    // @desc   GET getting profile page by id
    // @route  GET /profile?id=<userId>
    // @access Private (auth user)
    public function profile(string $id): void
    {
        parent::renderView("profile/index", ["title" => "ABCD", "render_partials" => false, "page" => $id]);
    }
}
