<?php

namespace App\Infrastructure\Product\Contract;

interface IProductUploadFileService
{
    public function storageFile($filePath, $originalName, $storedFileName, $productId);
}
