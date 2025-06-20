<?php

namespace App\Http\Controllers\Api\V1;

use App\Application\UseCase\Contract\IProductUploadFileServiceUseCase;
use App\Exceptions\MensagemDetails;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;

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
            $storedFileName = 'product_'.$id.'_'.time().'_'.$originalName;

            $response = $this->productFileUseCase->execute($filePath, $originalName, $storedFileName, $id);

            if (isset($response['error'])) {
                throw new NotFoundException($response['message'], 400);
            }

            return response()->json(['message' => 'Image uploaded', 'data' => $response], 201);
        } catch (NotFoundException $e) {
            $erroDetails = new MensagemDetails($e->getMessage(), 'warning', $e->getCode());

            return response()->json($erroDetails->toArray(), $e->getCode() ?: 500);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?: 500);
        }
    }
}
