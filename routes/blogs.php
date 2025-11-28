<?php

use App\Controllers\Blogs as BlogsController;

$router->get("/blogs", [BlogsController::class, "index"]);