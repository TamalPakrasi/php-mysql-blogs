<?php

use App\Controllers\Profile as ProfileController;

$router->get("/profile/me", [ProfileController::class, "index"]);

$hasId = isset($params["id"]);

if ($hasId) {
  $router->get("/profile", [ProfileController::class, "profile"]);  
}