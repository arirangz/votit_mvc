<?php
require_once __DIR__ ."/../vendor/autoload.php";

session_set_cookie_params([
    "httponly" => true
]);

session_start();

define("APP_ROOT", dirname(__DIR__));
define("APP_ENV", ".env.local");

use App\Routing\Router;

$router = new Router();
$router->handleRequest($_SERVER['REQUEST_URI']);