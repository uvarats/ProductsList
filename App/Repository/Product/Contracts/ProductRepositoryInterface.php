<?php

declare(strict_types=1);

namespace App\Repository\Product\Contracts;

use App\Model\Product;
use mysqli_result;

interface ProductRepositoryInterface
{
    public function get(int $id): ?Product;
    public function remove(array $id): bool|mysqli_result;
    public function all(callable $condition = null): null|array;
}
