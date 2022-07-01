<?php

declare(strict_types=1);

namespace App\Validator\Product;

use App\Validator\ValidationError;

class ProductValidator
{
    public static function getValidator(string $type): null|ProductValidatorInterface
    {
        $validators = [
            'Book' => (fn() => new BookValidator()),
            'DVD' => (fn() => new DVDValidator()),
            'Furniture' => (fn() => new FurnitureValidator())
        ];
        return $validators[$type]();
    }
    protected function validateBase(array $data): ValidationError|array
    {
        $keys = ['sku', 'name', 'price'];
        $values = [];
        foreach($keys as $key) {
            if(!isset($data[$key])) {
                return new ValidationError('Missing "' . $key . '" value!');
            }
            $values[$key] = $data[$key];
        }

        return $values;
    }
}