<?php

declare(strict_types=1);

namespace App\Model;

class DVD extends Product
{
    private int $size;

    public function __construct(array $params = null)
    {
        if($params) {
            parent::__construct($params);
            $this->size = $params['Size'] ?? 0.0;
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
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    public function __toString(): string
    {
        return "Size: {$this->getSize()}";
    }

}
