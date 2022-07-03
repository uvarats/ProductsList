<?php

declare(strict_types=1);

namespace App\Repository\Product;

use App\Container;
use App\Repository\Product\Contracts\ProductAddInterface;

class ProductRepositoryMap
{
    private function __construct() {}

    public static function getRepository(string $type): null|ProductAddInterface
    {
        $container = Container::getInstance();
        $repositories = [
            'Book' => fn() => $container->get(BookRepository::class),
            'DVD' => fn() => $container->get(DVDRepository::class),
            'Furniture' => fn() => $container->get(FurnitureRepository::class),
        ];
        if($repositories[$type]) {
            return $repositories[$type]();
        }
        return null;
    }
}