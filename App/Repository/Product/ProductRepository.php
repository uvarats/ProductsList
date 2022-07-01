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
        $query = 'SELECT * FROM products p WHERE p.Id = ?';
        $result = $this->mySQL->preparedQuery($query, [$id]);
        $result = $result->fetch_assoc();
        if($result) {
            $type = $result['ProductType'];
            $typeName = $this->productUtil->getTypeName($type);
            $query = 'SELECT * FROM ' . strtolower($typeName) . ' t WHERE t.ProductId = ?';
            $queryResult = $this->mySQL->preparedQuery($query, [$id]);
            $result = array_merge(
                $result,
                $queryResult->fetch_assoc()
            );
            return $this->productUtil->getProductByType($type, $result);
        }
        return null;
    }

    public function remove(int|array $id): void
    {
        $query = 'DELETE FROM products p WHERE p.Id = ?';
        $params = [$id];
        if (is_array($id)) {
            $ids = implode("','", $id);
            $query = "DELETE FROM products p WHERE p.Id IN ('" . $ids. "')";
            $params = [];
        }
        $result = $this->mySQL->preparedQuery($query, $params);
        var_dump($result->fetch_assoc());
    }

    public function all(callable $condition = null): array
    {
        $query = 'SELECT * FROM products 
                LEFT OUTER JOIN book B on Products.Id = B.ProductId 
                LEFT OUTER JOIN dvd D on Products.Id = D.ProductId 
                LEFT OUTER JOIN furniture F on Products.Id = F.ProductId';
        $result = $this->mySQL->query($query);
        $array = $result->fetch_all(MYSQLI_ASSOC);
        return array_map(function ($entry) {
            return $this->productUtil->getProductByType($entry['ProductType'], $entry);
        }, $array);
    }

    protected function addProduct(Product $product): void
    {
        $baseQuery = 'INSERT INTO products (SKU, Name, Price, ProductType) VALUES (?, ?, ?, ?)';
        $classname = ClassUtil::getClassName($product::class);
        $this->mySQL->preparedQuery($baseQuery, [
            $product->getSKU(),
            $product->getName(),
            $product->getPrice(),
            $classname
        ]);
    }
}