<?php

declare(strict_types=1);

namespace App\Controller;

use App\Attribute\Route;
use App\Container;
use App\Model\Furniture;
use App\Model\Product;
use App\Repository\Product\FurnitureRepository;
use App\Repository\Product\ProductRepository;
use App\Repository\Product\ProductRepositoryMap;
use App\Util\ProductUtil;
use App\Validator\Product\ProductValidator;
use App\Validator\ValidationError;
use App\View;
use Twig\Environment;

class ProductController
{
    private Environment $twig;
    public function __construct()
    {
        $this->twig = View::getTwig();
    }

    #[Route('/')]
    public function main(): void
    {
        $container = Container::getInstance();
        /** @var ProductRepository $repository */
        $repository = $container->get(ProductRepository::class);
        echo $this->twig->render('index.html.twig', [
            'products' => $repository->all(),
        ]);
    }

    #[Route("/add-product")]
    public function add(): void
    {
        echo $this->twig->render('add-product/index.html.twig');
    }
    #[Route('/product/submit', method: 'POST')]
    public function submit(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        if(!isset($_REQUEST['type'])) {
            throw new \InvalidArgumentException();
        }
        $validator = ProductValidator::getConcreteValidator($_REQUEST['type']);
        if ($validator) {
            $validationResult = $validator->validate($_REQUEST);
            if($validationResult instanceof Product) {
                $repository = ProductRepositoryMap::getRepository($_REQUEST['type']);
                $repository->add($validationResult);
                echo json_encode([
                    'success' => 'Product successfully added.'
                ]);
                return;
            }
            echo $validationResult;
            return;
        }
        echo new ValidationError('Validator for type ' . $_REQUEST['type'] . ' is missing.');
    }

    #[Route('/product/delete', method: 'POST')]
    public function delete(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $payload = file_get_contents('php://input');
            $data = json_decode($payload);
            $container = Container::getInstance();
            /** @var ProductRepository $repository */
            $repository = $container->get(ProductRepository::class);
            $result = $repository->remove($data);
            echo json_encode([
                'result' => is_bool($result),
            ]);
        } catch(\Exception $e) {
            error_log($e->getMessage());
        }
    }

    #[Route('/product/get/dynamicfields', method: 'POST')]
    public function getDynamicFields(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        echo include VIEWS_PATH . '/add-product/dynamic_fields.php';
    }
}