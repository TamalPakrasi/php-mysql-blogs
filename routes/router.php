<?php

use App\Core\Router;

try {
    $router = new Router();

    $params = $router->get_params();

    // order of arguments route, [controller_class, action], [...middlewares]
    require_once "home.php";

    require_once "blogs.php";

    $router->dispatch();
} catch (\Exception $e) {
    abort($e);
}
