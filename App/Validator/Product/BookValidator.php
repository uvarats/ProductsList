<?php

declare(strict_types=1);

namespace App\Validator\Product;

use App\Model\Book;
use App\Validator\ValidationError;

class BookValidator extends ProductValidator implements ProductValidatorInterface
{
    public function validate(array $data): ValidationError|Book
    {
        $base = parent::validateBase($data);
        if (is_array($base)) {
            $keys = ['Weight'];
            foreach ($keys as $key) {
                $lowerKey = strtolower($key);
                if (!isset($base[$lowerKey])) {
                    return new ValidationError($key . ' value is missing or it has invalid type (e.g file).
                    Please, do not change form in developer console...');
                }
            }
            if (!is_numeric($base['weight'])) {
                return new ValidationError('Weight must be a numeric.');
            }

            return new Book($base);
        }
        return $base;
    }
}
