<?php

use App\Controllers\Blogs as BlogsController;

$hasId = isset($params["id"]);

if (!$hasId) {
    $router->get("/blogs", [BlogsController::class, "index"]);
} else {
    $router->get("/blogs", [BlogsController::class, "one"]);
}
