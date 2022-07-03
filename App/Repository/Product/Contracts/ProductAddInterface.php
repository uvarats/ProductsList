<?php

declare(strict_types=1);

namespace App\Repository\Product\Contracts;

use App\Model\Product;

interface ProductAddInterface
{
    public function add(Product $product): null|array;
}
