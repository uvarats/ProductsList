<?php

namespace App\Model;

include 'Product.php';

class DVD extends Product
{
    private int $size;

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
}
