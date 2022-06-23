<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Route;
use App\Persistence\MySQL;

class ProductController
{

    public function __construct(private MySQL $db)
    {
    }

    #[Route('/')]
    public function main(): void
    {
        $db = $this->db->getConnection();
        require VIEWS_PATH . '/index.php';
    }

    #[Route("/add-product")]
    public function add(): void
    {
        require VIEWS_PATH . '/add-product/index.php';
    }
    #[Route('/product/submit', method: 'POST')]
    public function submit(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($_REQUEST);
    }
    #[Route('/product/get/dynamicfields', method: 'POST')]
    public function getDynamicFields() {
        header('Content-Type: application/json; charset=utf-8');
        echo include VIEWS_PATH . '/add-product/dynamic_fields.php';
    }
}