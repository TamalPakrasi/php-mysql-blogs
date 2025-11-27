<?php

namespace App\Controllers;

use App\Core\Controller;

class Home extends Controller
{
    // @desc   GET getting home page
    // @route  GET /
    // @access Public
    public function index(): void
    {
        parent::renderView("home/index", ["title" => "Home"]);
    }
}
