<?php

declare(strict_types=1);

namespace App\Validator\Product;

use App\Model\DVD;

class DVDValidator extends ProductValidator implements ProductValidatorInterface
{

    public function validate(array $data): null|DVD
    {
        $base = parent::validateBase($data);
        if($base) {
            return new DVD();
        }
        return null;
    }
}