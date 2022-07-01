<?php

declare(strict_types=1);

namespace App\Validator\Product;

use App\Model\Furniture;

class FurnitureValidator extends ProductValidator implements ProductValidatorInterface
{

    /**
     * @param array $data
     * @return Furniture|null
     */
    public function validate(array $data): null|Furniture
    {
        $base = parent::validateBase($data);
        if($base) {
            return new Furniture();
        }
        return null;
    }
}