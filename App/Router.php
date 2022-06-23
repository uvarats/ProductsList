<?php

declare(strict_types=1);

namespace App;

use App\Attributes\Route;
use App\Exceptions\RouteNotFoundException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use ReflectionMethod;

class Router
{
    private array $routes = [];
    private Container $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }


    public function parseRoutes(array $controllers): void
    {
        foreach($controllers as $controller) {
            $reflection = new \ReflectionClass($controller);
            $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);
            foreach($methods as $method) {
                $attributes = $method->getAttributes(Route::class);
                foreach($attributes as $attribute) {
                    /** @var Route $route */
                    $route = $attribute->newInstance();
                    $this->registerRoute(
                        $route->getMethod(),
                        $route->getRoute(),
                        [$controller, $method->getName()]
                    );
                }
            }
        }
    }
    public function registerRoute(string $method, string $path, callable|array $action): self
    {
        $this->routes[$method][$path] = $action;

        return $this;
    }
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * @param string $requestPath
     * @param string $requestMethod
     * @return mixed
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws RouteNotFoundException
     */
    public function process(string $requestPath, string $requestMethod) {
        $action = $this->routes[$requestMethod][$requestPath] ?? null;
        if(!$action) {
            throw new RouteNotFoundException($requestPath);
        }
        if(is_callable($action)) {
            call_user_func($action);
        }
        [$class, $method] = $action;
        if(class_exists($class)) {
            $class = $this->container->get($class);

            if(method_exists($class, $method)) {
                return call_user_func_array([$class, $method], []);
            }
        }
        throw new RouteNotFoundException($requestPath);
    }
}
