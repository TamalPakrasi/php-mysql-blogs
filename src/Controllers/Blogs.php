<?php

namespace App\Controllers;

use App\Core\Controller;

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
}
