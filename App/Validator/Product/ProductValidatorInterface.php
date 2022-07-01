<?php

declare(strict_types=1);

namespace App\Validator\Product;

use App\Model\Product;
use App\Validator\ValidatorInterface;

interface ProductValidatorInterface extends ValidatorInterface
{
    /**
     * @param array $data
     * @return Product|null
     */
    public function validate(array $data): null|Product;
}