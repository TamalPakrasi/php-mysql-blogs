<?php

declare(strict_types=1);
date_default_timezone_set("UTC");
require_once __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

define("BASE_URL", $_ENV["BASE_URL"]);

session_set_cookie_params([
  'lifetime' => 0,
  'path' => BASE_URL . "/",
  'domain' => '',
  'secure' => $_ENV["PHP_ENV"] !== "development",
  'httponly' => true,
  'samesite' => 'strict'
]);

session_start();

require_once get_path("routes/router");