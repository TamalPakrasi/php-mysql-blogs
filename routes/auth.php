<?php

use App\Controllers\Auth as AuthController;

use App\Middlewares\Guest;
use App\Middlewares\Protect;
use App\Middlewares\IsImage;

$router->get("/get-started", [AuthController::class, "index"], [Guest::class]);

$router->post("/api/auth/register", [AuthController::class, "register"], [Guest::class, IsImage::class]);

$router->post("/api/auth/login", [AuthController::class, "login"], [Guest::class]);

$router->post("/api/auth/logout", [AuthController::class, "logout"], [Protect::class]);
