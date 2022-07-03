<?php

declare(strict_types=1);

namespace App\Validator\Product;

use App\Model\Furniture;
use App\Validator\ValidationError;

class FurnitureValidator extends ProductValidator implements ProductValidatorInterface
{
    /**
     * @param array $data
     * @return Furniture|null
     */
    public function validate(array $data): ValidationError|Furniture
    {
        $base = parent::validateBase($data);
        if (is_array($base)) {
            $keys = ['Height', 'Width', 'Length'];
            foreach ($keys as $key) {
                $lowerKey = strtolower($key);
                if (!isset($data[$lowerKey])) {
                    return new ValidationError($key . ' value is missing or it has invalid type (e.g file). Please, do not change form in developer console...');
                }
                if (!is_numeric($base['height'])) {
                    return new ValidationError('Height must be a numeric.');
                }
                if (!is_numeric($base['width'])) {
                    return new ValidationError('Width must be a numeric.');
                }
                if (!is_numeric($base['length'])) {
                    return new ValidationError('Length must be a numeric.');
                }

                return new Furniture($base);
            }
        }
        return new $base();
    }
}
