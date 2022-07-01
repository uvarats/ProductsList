<?php

namespace App\Util;

use App\Model\{Book, DVD, Furniture, Product};

class ProductUtil
{
    private array $productTypes;
    private array $types;

    public function __construct()
    {
        $this->types = [
            '0' => 'Book',
            '1' => 'DVD',
            '2' => 'Furniture'
        ];
        $this->productTypes = [
            '0' => fn(array $params = null) => new Book($params),
            '1' => fn(array $params = null) => new DVD($params),
            '2' => fn(array $params = null) => new Furniture($params)
        ];
    }

    public function getProductByType(int $type, array $params = null): Product
    {
        return $this->productTypes[$type]($params);
    }

    public function getTypeName(int $type): string
    {
        return $this->types[$type];
    }

    public function getTypeId(string $typeName): bool|int|string
    {
        return array_search($typeName, $this->types, true);
    }
}