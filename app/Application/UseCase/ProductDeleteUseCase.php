<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Contract\IProductDeleteUseCase;
use App\Infrastructure\Product\Contract\IProductDeleteRepository;

class ProductDeleteUseCase implements IProductDeleteUseCase
{
    protected $productRepository;

    public function __construct(IProductDeleteRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(int $id)
    {
        return $this->productRepository->delete($id);
    }
}
