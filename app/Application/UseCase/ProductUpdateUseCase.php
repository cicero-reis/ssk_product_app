<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Contract\IProductUpdateUseCase;
use App\Infrastructure\Product\Contract\IProductUpdateRepository;

class ProductUpdateUseCase implements IProductUpdateUseCase
{
    protected $productRepository;

    public function __construct(IProductUpdateRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(int $id, array $body)
    {
        return $this->productRepository->update($id, $body);
    }
}
