<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Contract\IProductGetCategoryIdUseCase;
use App\Infrastructure\Product\Contract\IProductGetCategoryIdRepository;

class ProductGetCategoryIdUseCase implements IProductGetCategoryIdUseCase
{
    protected $productRepository;

    public function __construct(IProductGetCategoryIdRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(int $categoryId)
    {
        return $this->productRepository->getCategoryId($categoryId);
    }
}
