<?php

use App\Controllers\Home;

$router->get("/", [Home::class, "index"]);