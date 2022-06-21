<?php

use App\Container;
use App\Controllers\ProductController;
use App\Router;

require_once __DIR__ . '/../vendor/autoload.php';

const VIEWS_PATH = __DIR__ . '/../Views';

$container = new Container();
$router = new Router($container);

$router->parseRoutes([
    ProductController::class
]);

$path = $_SERVER['PATH_INFO'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'];

$router->process($path, $method);
