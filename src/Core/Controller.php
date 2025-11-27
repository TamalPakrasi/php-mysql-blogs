<?php

namespace App\Core;

use Exception;

abstract class Controller
{
    protected function renderView(string $view, array $data = []): void
    {
        $file = get_path("views/pages/" . $view);

        if (!file_exists($file)) {
            throw new Exception();
        }

        extract($data);

        ob_start();
        require $file;
        $content = ob_get_clean();

        require_once get_path("views/layouts/index");
        exit;
    }

    protected function redirect(string $url, string $message)
    {
        $_SESSION["message"] = $message;
        header("Location: $url");
        exit;
    }
}
