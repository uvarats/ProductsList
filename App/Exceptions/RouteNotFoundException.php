<?php

namespace App\Exceptions;

class RouteNotFoundException extends \Exception
{

    public function __construct(string $route)
    {
        parent::__construct("Route " . $route . " is not found.");
    }
}