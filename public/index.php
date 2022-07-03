<?php

use App\Container;
use App\Controller\ProductController;
use App\Exception\RouteNotFoundException;
use App\Router;
use Dotenv\Dotenv;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once __DIR__ . '/../vendor/autoload.php';

$file = dirname(__DIR__) . '/.env';
if(file_exists($file)) {
    $dotenv = Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();
}

const VIEWS_PATH = __DIR__ . '/../Views';

$container = Container::getInstance();
$router = new Router($container);

$router->parseRoutes([
    ProductController::class
]);


$path = $_SERVER['PATH_INFO'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'];

try {
    $router->process($path, $method);
} catch (RouteNotFoundException $e) {
    include VIEWS_PATH . '/404.php';
} catch (Exception $e) {
    error_log($e->getMessage());
}
