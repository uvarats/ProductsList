<?php

declare(strict_types=1);

namespace App\Model;

include 'Product.php';

class Book extends Product
{
    private float $weight;

    /**
     * @param float $weight
     * @return Book
     */
    public function setWeight(float $weight): Book
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }
}
