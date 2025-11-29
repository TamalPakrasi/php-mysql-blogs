<?php

namespace App\Core;

class Middleware
{
    static public function run(array $middlewares = []) {
        if (!empty($middlewares)) {
            foreach ($middlewares as $middleware) {
                (new $middleware)->handle();
            }
        }
    }
}
