<?php

namespace App\Exception;

class RouteNotFoundException extends \Exception
{
    public function __construct(string $route)
    {
        parent::__construct("Route " . $route . " is not found.");
    }
}
