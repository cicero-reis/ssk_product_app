<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Contract\IProductGetByIdUseCase;
use App\Exceptions\NotFoundException;
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
        if (! is_numeric($id) || $id <= 0) {
            throw new NotFoundException('Invalid id', 400);
        }

        $result = $this->productRepository->getById($id);

        if (empty($result)) {
            throw new NotFoundException('Product not found', 404);
        }

        return $result;
    }
}
