<?php

use App\Controllers\Auth as AuthController;

use App\Middlewares\CSRF;
use App\Middlewares\Guest;
use App\Middlewares\Protect;
use App\Middlewares\IsImage;

$router->get("/get-started", [AuthController::class, "index"], [Guest::class]);

$router->post("/api/auth/register", [AuthController::class, "register"], [Guest::class, CSRF::class, IsImage::class]);

$router->post("/api/auth/login", [AuthController::class, "login"], [Guest::class, CSRF::class]);

$router->post("/api/auth/logout", [AuthController::class, "logout"], [Protect::class, CSRF::class]);
