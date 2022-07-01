<?php

declare(strict_types=1);

namespace App\Controller;

use App\Attribute\Route;
use App\Container;
use App\Model\Furniture;
use App\Repository\Product\FurnitureRepository;
use App\Repository\Product\ProductRepository;
use App\Util\ProductUtil;
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
        $furniture = new Furniture();
        $furniture->setSKU("FR0003")
            ->setName("Vadim")
            ->setPrice(2.28)
            ->setHeight(3.4)
            ->setLength(2.8)
            ->setWidth(13.37);
        /** @var FurnitureRepository $f */
        $f = $container->get(FurnitureRepository::class);
        $f->add($furniture);
        echo $this->twig->render('index.html.twig', [
            'products' => $f->all(),
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
        //$test = $this->productRepository->get(2);
        //$validator = ProductValidator::getValidator($_REQUEST['type']);
//        if ($validator) {
//            $product = $validator->validate($_REQUEST);
//            if($product) {
//                $this->productRepository->add($product);
//            }
//        }
        echo json_encode($_REQUEST);
    }
    #[Route('/product/get/dynamicfields', method: 'POST')]
    public function getDynamicFields(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        echo include VIEWS_PATH . '/add-product/dynamic_fields.php';
    }
}