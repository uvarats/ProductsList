<?php

declare(strict_types=1);

namespace App\Validator\Product;

use App\Model\DVD;
use App\Validator\ValidationError;

class DVDValidator extends ProductValidator implements ProductValidatorInterface
{
    public function validate(array $data): ValidationError|DVD
    {
        $base = parent::validateBase($data);
        if (is_array($base)) {
            $keys = ['Size'];
            foreach ($keys as $key) {
                $lowerKey = strtolower($key);
                if (!isset($base[$lowerKey])) {
                    return new ValidationError($key . ' value is missing or it has invalid type (e.g file).
                    Please, do not change form in developer console...');
                }
            }
            if (!is_numeric($base['size'])) {
                return new ValidationError('Size must be a numeric.');
            }
            return new DVD($base);
        }
        return $base;
    }
}
