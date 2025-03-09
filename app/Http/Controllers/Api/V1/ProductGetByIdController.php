<?php

namespace App\Http\Controllers\Api\V1;

use App\Application\UseCase\Contract\IProductGetByIdUseCase;
use App\Exceptions\MensagemDetails;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
use Throwable;

class ProductGetByIdController extends Controller
{
    private $productUseCase;

    public function __construct(IProductGetByIdUseCase $productUseCase)
    {
        $this->productUseCase = $productUseCase;
    }

    public function __invoke(int $id): JsonResponse
    {
        try {

            $product = $this->productUseCase->execute($id);

            if (is_null($product)) {
                throw new NotFoundException('Not product found', 404);
            }

            return response()->json([
                'data' => new ProductResource($product),
            ], 200);
        } catch (NotFoundException $e) {

            $erroDetails = new MensagemDetails($e->getMessage(), 'warning', 404);
            return response()->json($erroDetails->toArray(), 404);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?: 500);
        }
    }
}
