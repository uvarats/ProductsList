<?php

declare(strict_types=1);

namespace App\Repository\Product;

use App\Model\Book;
use App\Model\Product;
use App\Persistence\MySQL;
use App\Repository\Product\Contracts\ProductAddInterface;
use App\Util\ProductUtil;

class BookRepository extends ProductRepository implements ProductAddInterface
{
    public function __construct(MySQL $mySQL, ProductUtil $productUtil)
    {
        parent::__construct($mySQL, $productUtil);
    }

    public function add(Product $product): null|array
    {
        if ($product instanceof Book) {
            $bookQuery = 'INSERT INTO book (productId, weight) VALUES (?, ?);';
            try {
                parent::addProduct($product);
                $this->mySQL->preparedQuery($bookQuery, [
                    $this->mySQL->getDb()->insert_id,
                    $product->getWeight(),
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
