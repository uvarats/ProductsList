<?php

declare(strict_types=1);

namespace App\Model;

class Book extends Product
{
    private float $weight;

    public function __construct(array $params = null)
    {
        if($params) {
            parent::__construct($params);
            $this->weight = $params['weight'] ?? 0.0;
        }
    }

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

    public function __toString(): string
    {
        return "Weight: {$this->getWeight()}kg";
    }


}
