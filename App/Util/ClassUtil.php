<?php

namespace App\Util;

class ClassUtil
{
    public static function getClassName(string $classname): string
    {
        if($pos = strrpos($classname, '\\')) {
            return substr($classname, $pos + 1);
        }
        return $classname;
    }
}