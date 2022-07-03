<?php

declare(strict_types=1);

namespace App\Repository\Product;

use App\Exception\Product\ProductTypeMismatchException;
use App\Model\Furniture;
use App\Model\Product;
use App\Persistence\MySQL;
use App\Repository\Product\Contracts\ProductAddInterface;
use App\Util\ProductUtil;

class FurnitureRepository extends ProductRepository implements ProductAddInterface
{
    public function __construct(MySQL $mySQL, ProductUtil $productUtil)
    {
        parent::__construct($mySQL, $productUtil);
    }

    /**
     * @throws ProductTypeMismatchException
     */
    public function get(int $id): ?Furniture
    {
        $result = parent::get($id);
        if ($result instanceof Furniture) {
            return $result;
        }
        throw new ProductTypeMismatchException($result::class, $this::class);
    }

    public function add(Product $product): null|array
    {
        if ($product instanceof Furniture) {
            $furnitureQuery = 'INSERT INTO furniture (productId, height, width, length) VALUES (?, ?, ?, ?)';
            try {
                parent::addProduct($product);
                $this->mySQL->preparedQuery($furnitureQuery, [
                    $this->mySQL->getDb()->insert_id,
                    $product->getHeight(),
                    $product->getWidth(),
                    $product->getLength()
                ]);
            } catch (\mysqli_sql_exception $e) {
                error_log($e->getMessage(), 0);
                return [
                    'errorCode' => $e->getCode(),
                ];
            }
        }
        return null;
    }
}
