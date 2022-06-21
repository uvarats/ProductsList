<?php

declare(strict_types=1);

namespace App\Model;

class Furniture extends Product
{
    private float $height;
    private float $width;
    private float $length;

    /**
     * @param float $height
     * @return Furniture
     */
    public function setHeight(float $height): Furniture
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $width
     * @return Furniture
     */
    public function setWidth(float $width): Furniture
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $length
     * @return Furniture
     */
    public function setLength(float $length): Furniture
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }
    public function getDimensions(): string
    {
        return "{$this->height}x{$this->width}x{$this->length}";
    }
}
