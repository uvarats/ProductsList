<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\ContainerException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id)
    {
        if ($this->has($id)) {
            $entry = $this->entries[$id];

            if (is_callable($entry)) {
                return $entry($this);
            }
        }

        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable $concrete)
    {
        $this->entries[$id] = $concrete;
    }

    /**
     * @throws NotFoundExceptionInterface
     * @throws \ReflectionException
     * @throws ContainerExceptionInterface
     * @throws ContainerException
     */
    public function resolve(string $id)
    {
        $reflectionClass = new \ReflectionClass($id);
        if (!$reflectionClass->isInstantiable()) {
            throw new ContainerException("Entry " . $id . " is not instantiable.");
        }
        $constructor = $reflectionClass->getConstructor();
        if (!$constructor) {
            return new $id();
        }
        $params = $constructor->getParameters();
        if (!$params) {
            return new $id();
        }
        $dependencies = array_map(
        function (\ReflectionParameter $parameter) use ($id) {
                $name = $parameter->getName();
                $type = $parameter->getType();

                if (!$type) {
                    throw new ContainerException(
                        "Can't to resolve " . $id . ": param " . $name . " hasn't type hint."
                    );
                }
                if($type instanceof \ReflectionUnionType) {
                    throw new ContainerException(
                        "Can't to resolve " . $id . ": param " . $name . " is union."
                    );
                }
                if($type instanceof  \ReflectionNamedType && !$type->isBuiltin()) {
                    return $this->get($type->getName());
                }

                throw new ContainerException(
                    "Can't to resolve " . $id . ": param " . $name . " is invalid."
                );
            },
            $params
        );
        return $reflectionClass->newInstanceArgs($dependencies);
    }
}
