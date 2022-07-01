<?php

declare(strict_types=1);

namespace App\Repository\Product\Contracts;

use App\Model\Product;

interface ProductRepositoryInterface
{
    public function get(int $id): ?Product;
    public function remove(int $id): void;
    public function all(callable $condition = null): null|array;
}