<?php

declare(strict_types=1);

namespace App\Repository\Product;

use App\Model\Product;
use App\Persistence\MySQL;
use App\Repository\Product\Contracts\ProductAllInterface;
use App\Repository\Product\Contracts\ProductGetInterface;
use App\Repository\Product\Contracts\ProductRemoveInterface;
use App\Repository\Product\Contracts\ProductRepositoryInterface;
use App\Util\ClassUtil;
use App\Util\ProductUtil;
use mysqli_result;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(
        protected MySQL $mySQL,
        protected ProductUtil $productUtil
    )
    {
    }

    public function get(int $id): ?Product
    {
        $query = 'SELECT * FROM products p WHERE p.id = ?';
        $result = $this->mySQL->preparedQuery($query, [$id]);
        $result = $result->fetch_assoc();
        if($result) {
            $type = $result['type'];
            $typeName = $this->productUtil->getTypeName($type);
            $query = 'SELECT * FROM ' . strtolower($typeName) . ' t WHERE t.productId = ?';
            $queryResult = $this->mySQL->preparedQuery($query, [$id]);
            $result = array_merge(
                $result,
                $queryResult->fetch_assoc()
            );
            return $this->productUtil->getProductByType($type, $result);
        }
        return null;
    }

    public function remove(array $id): bool|mysqli_result
    {
        $ids = implode("','", $id);
        $query = "DELETE FROM products WHERE id IN ('" . $ids. "')";
        return $this->mySQL->query($query);
    }

    public function all(callable $condition = null): array
    {
        $query = 'SELECT * FROM products p
                LEFT OUTER JOIN book b on p.id = b.productId 
                LEFT OUTER JOIN dvd d on p.id = d.productId 
                LEFT OUTER JOIN furniture f on p.id = f.productId';
        $result = $this->mySQL->query($query);
        $array = $result->fetch_all(MYSQLI_ASSOC);
        return array_map(function ($productData) {
            return $this->productUtil->getProductByType($productData['type'], $productData);
        }, $array);
    }

    protected function addProduct(Product $product): void
    {
        $baseQuery = 'INSERT INTO products (sku, name, price, type) VALUES (?, ?, ?, ?)';
        $classname = ClassUtil::getClassName($product::class);
        $this->mySQL->preparedQuery($baseQuery, [
            $product->getSKU(),
            $product->getName(),
            $product->getPrice(),
            $this->productUtil->getTypeId($classname)
        ]);
    }
    public function isSKUUnique(string $sku) {
        $query = 'SELECT * FROM products p WHERE p.sku = ?';
        $result = $this->mySQL->preparedQuery($query, [$sku]);
        return !$result->num_rows;
    }
}