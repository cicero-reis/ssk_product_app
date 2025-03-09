<?php

namespace App\Http\Controllers\Api\V1;

use App\Application\Service\S3UploadService;
use App\Application\UseCase\Contract\IProductUploadFileServiceUseCase;
use App\Exceptions\MensagemDetails;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Infrastructure\Product\Service\S3UploadService as ServiceS3UploadService;
use Illuminate\Http\Request;

class ProductUploadFileController extends Controller
{
    protected IProductUploadFileServiceUseCase $productFileUseCase;

    public function __construct(IProductUploadFileServiceUseCase $productFileUseCase)
    {
        $this->productFileUseCase = $productFileUseCase;
    }

    public function __invoke(Request $request, int $id)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {

            $file = $request->file('image');
            $filePath = $file->getRealPath();

            $originalName = $file->getClientOriginalName();
            $storedFileName = 'product_' . $id . '_' . time() . '_' . $originalName;

            $response = $this->productFileUseCase->execute($filePath, $originalName, $storedFileName, $id);

            if (isset($response['error'])) {
                throw new NotFoundException($response['message'], 400);
            }

            return response()->json(['message' => 'Image uploaded', 'data' => $response], 201);
        } catch (NotFoundException $e) {
            $errorDetails = new MensagemDetails(
                $e->getMessage(),
                'danger',
                $e->getCode()
            );
            return response()->json($errorDetails, $e->getCode());
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 500);
        }
    }
}
