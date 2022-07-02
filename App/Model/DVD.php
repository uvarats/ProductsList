<?php

declare(strict_types=1);

namespace App\Model;

class DVD extends Product
{
    private float $size;

    public function __construct(array $params = null)
    {
        if($params) {
            parent::__construct($params);
            $this->size = floatval($params['size']);
        }
    }

    /**
     * @param int $size
     * @return DVD
     */
    public function setSize(int $size): DVD
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return float
     */
    public function getSize(): float
    {
        return $this->size;
    }

    public function __toString(): string
    {
        return "Size: {$this->getSize()}mb";
    }

}
