<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Contract\IProductUpdateUseCase;
use App\Exceptions\NotFoundException;
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
        if (! is_numeric($id) || $id <= 0) {
            throw new NotFoundException('Invalid id', 400);
        }

        if (empty($body)) {
            throw new NotFoundException('Body is required', 400);
        }

        return $this->productRepository->update($id, $body);
    }
}
