<?php

namespace App\Application\UseCase;

use App\Application\Dtos\ProductCreateDto;
use App\Application\UseCase\Contract\IProductCreateUseCase;
use App\Infrastructure\Product\Contract\IProductCreateRepository;

class ProductCreateUseCase implements IProductCreateUseCase
{
    protected $productRepository;

    public function __construct(IProductCreateRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(ProductCreateDto $dto)
    {
        return $this->productRepository->create($dto->toArray());
    }
}
