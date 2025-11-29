<?php

namespace App\Controllers;

use App\Core\Controller;

use App\Services\CSRF;

class Blogs extends Controller
{
    // @desc   GET getting blogs page
    // @route  GET /blogs
    // @access Private (auth user)
    public function index(): void
    {
        parent::renderView("blogs/index", ["title" => "All Blogs", "render_nav" => true]);
    }

    // @desc   GET getting blog by id
    // @route  GET /blogs?id=<userId>
    // @access Private (auth user)
    public function one(string $id): void
    {
        parent::renderView("blogs/one", ["title" => "aaaaa", "render_nav" => false, "id" => $id]);
    }

    // @desc   GET getting blog creation page
    // @route  GET /blogs/create
    // @access Private (auth user)
    public function create(): void
    {
        $csrf_token = CSRF::get();
        parent::renderView("blogs/create", ["title" => "Create New Blog", "render_partials" => false, "scripts" => ["form", "create"], "csrf_token" => $csrf_token]);
    }
}
