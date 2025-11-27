<?php


use App\Core\CustomException;

function debug(...$val): void
{
    echo "<pre>";
    var_dump($val);
    echo "</pre>";
    exit;
}

function get_href(string $href): void
{
    echo BASE_URL . $href;
}

function isActive(string $link): void
{
    $href = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    if (strpos($href, BASE_URL) === 0) $href = str_replace(BASE_URL, "", $href);
    echo $link === $href ? "active" : "";
}

function get_path(string $file): string
{
    return __DIR__ . "/../../" .  $file . ".php";
}

function require_file(string $file): void
{
    require_once get_path("views/" . $file);
}

function sendResponse(int $status, string $message, ...$payload): void
{
    header('Content-Type: application/json; charset=utf-8');
    http_response_code($status);
    echo json_encode([
        "status" => $status,
        "success" => $status >= 400 ? "Failed" : "Success",
        "message" => $message,
        "data" => count($payload) === 0 ? null : (count($payload) === 1 ? $payload[0] : $payload)
    ]);
    exit;
}

function abort(\Exception $e): void
{
    if ($e->getCode() === 404) {
        http_response_code(404);
        require_once get_path("views/pages/errors/404");
        exit;
    } else {
        $e instanceof CustomException ? sendResponse($e->getCode(), $e->getMessage()) : sendResponse(500, "Internal Server Error");
    }
}
