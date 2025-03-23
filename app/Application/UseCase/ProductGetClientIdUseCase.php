<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Contract\IProductGetClientIdUseCase;
use App\Infrastructure\Product\Contract\IProductGetClientIdRepository;

class ProductGetClientIdUseCase implements IProductGetClientIdUseCase
{
    protected $productRepository;

    public function __construct(IProductGetClientIdRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(int $id)
    {
        return $this->productRepository->getClientId($id);
    }
}
