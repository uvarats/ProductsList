<?php

namespace App\Controllers;

use App\Attributes\Route;
use App\Persistence\MySQL;

class ProductController
{

    public function __construct(private MySQL $db)
    {
    }

    #[Route('/')]
    public function main() {

    }
    #[Route("/add-product")]
    public function add() {

    }
}