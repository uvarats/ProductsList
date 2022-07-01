<?php

declare(strict_types=1);

namespace App\Validator\Product;

use App\Model\Book;

class BookValidator extends ProductValidator implements ProductValidatorInterface
{

    public function validate(array $data): null|Book
    {
        $base = parent::validateBase($data);
        if($base) {
            return new Book();
        }
        return null;
    }
}