<?php

namespace App\Application\UseCase\Contract;

interface IProductUploadFileServiceUseCase
{
    public function execute($filePath, $originalName, $storedFileName, $productId);
}
