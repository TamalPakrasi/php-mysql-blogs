<?php

use App\Core\Router;

try {
    $router = new Router();

    // order of arguments route, [controller_class, action], [...middlewares]
    require_once "home.php";

    $router->dispatch();
} catch (\Exception $e) {
    abort($e);
}
