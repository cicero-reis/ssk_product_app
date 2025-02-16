<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Contract\IProductGetAllUseCase;
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
        return $this->productRepository->getAll($body);
    }
}
