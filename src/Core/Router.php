<?php

namespace App\Core;

use App\Core\Middleware;

use App\Exceptions\NotAllowed;
use App\Exceptions\NotFound;

class Router
{
    private string $url = "";
    private array $params = [];
    private string $requestMethod = "";

    private array $routes = [];


    public function __construct()
    {
        if (!in_array($_SERVER["REQUEST_METHOD"], ["GET", "POST", "PUT", "DELETE"])) {
            throw new NotAllowed();
        }

        $uri = $_SERVER["REQUEST_URI"];

        $this->requestMethod = $_SERVER["REQUEST_METHOD"];
        $this->url = parse_url($uri, PHP_URL_PATH);

        parse_str(parse_url($uri, PHP_URL_QUERY), $this->params);

        if (strpos($this->url, BASE_URL) === 0) $this->url = str_replace(BASE_URL, "", $this->url);
    }

    public function get_params(): array
    {
        return $this->params;
    }

    // To dispatch a route
    public function dispatch(): void
    {
        if (!array_key_exists($this->url, $this->routes)) throw new NotFound();

        $routes = $this->routes[$this->url];

        if (!array_key_exists($this->requestMethod, $routes)) throw new NotAllowed();

        extract($routes[$this->requestMethod]);

        Middleware::run($middlewares);

        (new $controller)->$action(...array_values($this->params));
    }

    // function to add routes
    private function add(string $method, string $route, array $handlers, array $middlewares = []): void
    {
        list($controller, $action) = $handlers;

        $this->routes[$route][$method] = [
            "middlewares" => $middlewares,
            "controller" => $controller,
            "action" => $action
        ];
    }

    public function get(...$args): void
    {
        $this->add("GET", ...$args);
    }

    public function post(...$args): void
    {
        $this->add("POST", ...$args);
    }

    public function put(...$args): void
    {
        $this->add("PUT", ...$args);
    }

    public function delete(...$args): void
    {
        $this->add("DELETE", ...$args);
    }
}
