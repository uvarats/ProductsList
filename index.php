<?php

use App\Container;
use App\Controllers\ProductController;
use App\Router;

require_once __DIR__ . '/vendor/autoload.php';

$container = new Container();
$router = new Router($container);
$router->parseRoutes([
    ProductController::class
]);

$path = $_SERVER['PATH_INFO'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'];


$router->process($path, $method);

//$path = $_SERVER['PATH_INFO'] ?? '/';
//
//$page = "Pages";
//$page .= $path . '/index.php';
//if (file_exists($page)) {
//    include $page;
//} else {
//    include '404.php';
//}
