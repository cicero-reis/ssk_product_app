<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Contract\IProductUploadFileServiceUseCase;
use App\Infrastructure\Product\Contract\IProductUploadFileService;

class ProductUploadFileServiceUseCase implements IProductUploadFileServiceUseCase
{
    protected IProductUploadFileService $productfileService;

    public function __construct(IProductUploadFileService $productfileService)
    {
        $this->productfileService = $productfileService;
    }

    public function execute($filePath, $originalName, $storedFileName, $productId)
    {
        return $this->productfileService->storageFile($filePath, $originalName, $storedFileName, $productId);
    }
}
