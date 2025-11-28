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
        parent::renderView("blogs/index", ["title" => "All Blogs"]);
    }
}
