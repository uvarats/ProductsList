<?php

declare(strict_types=1);

namespace App\Model;

abstract class Product
{
    private ?int $id;
    private string $SKU;
    private string $name;
    private float $price;

    public function __construct(array $params = null)
    {
        if($params) {
            $this->id = $params['Id'];
            $this->SKU = $params['SKU'] ?? "Undefined";
            $this->name =  $params['Name'] ?? 'Undefined';
            $this->price = $params['Price'] ?? 0.0;
        }
    }

    /**
     * @param int|null $id
     * @return Product
     */
    public function setId(?int $id): Product
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string $SKU
     * @return Product
     */
    public function setSKU(string $SKU): Product
    {
        $this->SKU = $SKU;
        return $this;
    }

    /**
     * @return string
     */
    public function getSKU(): string
    {
        return $this->SKU;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param float $price
     * @return Product
     */
    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }
}
