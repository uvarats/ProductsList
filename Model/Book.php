<?php

namespace App\Model;

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