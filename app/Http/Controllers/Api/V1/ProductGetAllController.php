<?php

namespace App\Http\Controllers\Api\V1;

use App\Application\UseCase\Contract\IProductGetAllUseCase;
use App\Exceptions\MensagemDetails;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class ProductGetAllController extends Controller
{
    private $productUseCase;

    public function __construct(IProductGetAllUseCase $productUseCase)
    {
        $this->productUseCase = $productUseCase;
    }

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $body = $request->all();

            $products = $this->productUseCase->execute($body);

            if (empty($products)) {
                throw new NotFoundException('Product not found', 404);
            }

            $products = ProductResource::collection($products);

            return response()->json(['data' => $products], 200);
        } catch (NotFoundException $e) {

            $erroDetails = new MensagemDetails($e->getMessage(), 'warning', $e->getCode());

            return response()->json($erroDetails->toArray(), 404);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?: 500);
        }
    }
}
