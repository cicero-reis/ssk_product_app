<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Contract\IProductGetByIdUseCase;
use App\Infrastructure\Product\Contract\IProductGetByIdRepository;

class ProductGetByIdUseCase implements IProductGetByIdUseCase
{
    protected $productRepository;

    public function __construct(IProductGetByIdRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(int $id)
    {
        return $this->productRepository->getById($id);
    }
}
