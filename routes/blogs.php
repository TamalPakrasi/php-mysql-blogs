<?php

use App\Controllers\Blogs as BlogsController;

$hasId = isset($params["id"]);

if (!$hasId) {
    $router->get("/blogs", [BlogsController::class, "index"]);

    $router->get("/blogs/create", [BlogsController::class, "create"]);
} else {
    $router->get("/blogs", [BlogsController::class, "one"]);
}
