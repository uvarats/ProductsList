<?php

declare(strict_types=1);

namespace App\Repository\Product;

use App\Model\DVD;
use App\Model\Product;
use App\Persistence\MySQL;
use App\Repository\Product\Contracts\ProductAddInterface;
use App\Util\ProductUtil;

class DVDRepository extends ProductRepository implements ProductAddInterface
{
    public function __construct(MySQL $mySQL, ProductUtil $productUtil)
    {
        parent::__construct($mySQL, $productUtil);
    }

    public function add(Product $product): null|array
    {
        if($product instanceof DVD) {
            $dvdQuery = 'INSERT INTO DVD (ProductId, Size) VALUES (?, ?)';
            try {
                parent::addProduct($product);
                $this->mySQL->preparedQuery($dvdQuery, [
                    $this->mySQL->getDb()->insert_id,
                    $product->getSize()
                ]);
            } catch (\mysqli_sql_exception $e) {
                return [
                    'errorCode' => $e->getCode(),
                ];
            }
        }
        return null;
    }
}