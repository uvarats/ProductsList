<?php

namespace App\Exception;

use Psr\Container\ContainerExceptionInterface;

class NotFoundException extends \Exception implements ContainerExceptionInterface
{
}
