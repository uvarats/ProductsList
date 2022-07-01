<?php

namespace App;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class View
{
    private static ?Environment $twig = null;
    private function __construct() {}
    public static function getTwig(): Environment
    {
        if(is_null(self::$twig)) {
            $loader = new FilesystemLoader(VIEWS_PATH);
            self::$twig = new Environment($loader, [
                'debug' => true,
            ]);
            self::$twig->addExtension(new DebugExtension());
        }
        return self::$twig;
    }
}