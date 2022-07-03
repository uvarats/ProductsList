<?php

namespace App\Exception\Product;

class ProductTypeMismatchException extends \Exception
{
    public function __construct(private string $type, private string $repository)
    {
        parent::__construct("You're trying to get {$type} from {$repository}.");
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getRepository(): string
    {
        return $this->repository;
    }
}
