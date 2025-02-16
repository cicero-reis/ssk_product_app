<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Contract\IProductGetAllUseCase;
use App\Exceptions\NotFoundException;
use App\Infrastructure\Product\Contract\IProductGetAllRepository;

class ProductGetAllUseCase implements IProductGetAllUseCase
{
    protected $productRepository;

    public function __construct(IProductGetAllRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(array $body)
    {
        $products = $this->productRepository->getAll($body);

        if (empty($products)) {
            throw new NotFoundException('Not product found', 404);
        }

        return $products;
    }
}
