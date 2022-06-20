<?php

namespace App\Exceptions;

use Psr\Container\ContainerExceptionInterface;

class NotFoundException extends \Exception implements ContainerExceptionInterface
{
}