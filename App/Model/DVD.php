<?php

declare(strict_types=1);

namespace App\Model;

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
