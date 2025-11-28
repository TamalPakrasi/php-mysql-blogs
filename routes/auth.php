<?php

use App\Controllers\Auth as AuthController;

$router->get("/get-started", [AuthController::class, "index"]);