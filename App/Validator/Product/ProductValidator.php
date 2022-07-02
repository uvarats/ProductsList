<?php

declare(strict_types=1);

namespace App\Validator\Product;

use App\Container;
use App\Repository\Product\ProductRepository;
use App\Validator\ValidationError;

class ProductValidator
{
    public static function getConcreteValidator(string $type): null|ProductValidatorInterface
    {
        $validators = [
            'Book' => (fn() => new BookValidator()),
            'DVD' => (fn() => new DVDValidator()),
            'Furniture' => (fn() => new FurnitureValidator())
        ];
        if($validators[$type]) {
            return $validators[$type]();
        }
        return null;
    }
    protected function validateBase(array $data): ValidationError|array
    {
        $container = Container::getInstance();
        /** @var ProductRepository $repository */
        $repository = $container->get(ProductRepository::class);
        $keys = ['SKU', 'Name', 'Price'];
        foreach($keys as $key) {
            $lowerKey = strtolower($key);
            if(!isset($data[$lowerKey])) {
                return new ValidationError('Missing "' . $key . '" value!');
            }
        }
        if(strlen($data['sku']) > 30) {
            return new ValidationError("SKU should not be longer than 30 characters.");
        }
        if(strlen($data['name']) > 45) {
            return new ValidationError('Name should not be longer than 45 characters.');
        }
        if(!is_numeric($data['price'])) {
            return new ValidationError('Price must be a numeric.');
        }
        if(!$repository->isSKUUnique($data['sku'])) {
            return new ValidationError('SKU must be unique.');
        }
        return $data;
    }
}