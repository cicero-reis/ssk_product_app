<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Contract\IProductDeleteUseCase;
use App\Exceptions\NotFoundException;
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
        if (! is_numeric($id) || $id <= 0) {
            throw new NotFoundException('Invalid id', 400);
        }

        return $this->productRepository->delete($id);
    }
}
