<?php

namespace App\Infrastructure\Product\Base;

use App\Events\ProductImageUploadedEvent;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

abstract class ProductUploadFileAbstractService
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = app($this->apiUrl);
    }

    public function storageFile($filePath, $originalName, $storedFileName, $productId)
    {
        if (! file_exists($filePath)) {
            return ['error' => 'File not found'];
        }

        $fileContent = file_get_contents($filePath);
        $base64Image = 'data:image/'.pathinfo($storedFileName, PATHINFO_EXTENSION).';base64,'.base64_encode($fileContent);

        $payLoad = [
            'fileName' => $storedFileName,
            'fileContent' => $base64Image,
            'bucketName' => env('AWS_BUCKET_NAME'),
        ];

        try {

            $response = Http::post("$this->apiUrl/s3/upload", $payLoad);

            if ($response->successful()) {

                event(new ProductImageUploadedEvent($productId, $originalName, $storedFileName));

                return ['fileName' => $originalName];
            }
        } catch (Throwable $e) {
            Log::error('Failed to upload image', [
                'fileName' => $originalName,
                'message' => $e->getMessage(),
            ]);

            return [
                'error' => true,
                'message' => 'Failed to upload image',
            ];
        }
    }
}
