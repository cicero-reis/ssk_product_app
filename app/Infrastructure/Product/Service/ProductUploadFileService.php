<?php

namespace App\Infrastructure\Product\Service;

use App\Infrastructure\Product\Base\ProductUploadFileAbstractService;
use App\Infrastructure\Product\Contract\IProductUploadFileService;

class ProductUploadFileService extends ProductUploadFileAbstractService implements IProductUploadFileService
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('AWS_SAM_API_URL');
    }
}
