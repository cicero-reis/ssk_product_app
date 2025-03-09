<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Contract\IProductUpdateFileNameUseCase;
use App\Infrastructure\Product\Contract\IProductUpdateFileNameRepository;

class ProductUpdateFileNameUseCase implements IProductUpdateFileNameUseCase
{
    protected IProductUpdateFileNameRepository $productUpdateFileNameRepository;

    public function __construct(IProductUpdateFileNameRepository $productUpdateFileNameRepository)
    {
        $this->productUpdateFileNameRepository = $productUpdateFileNameRepository;
    }

    public function execute(int $id, string $originalName, string $storedFileName)
    {
        return $this->productUpdateFileNameRepository->updateFileName($id, $originalName, $storedFileName);
    }
}
