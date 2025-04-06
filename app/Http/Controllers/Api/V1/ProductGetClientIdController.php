<?php

namespace App\Http\Controllers\Api\V1;

use App\Application\UseCase\Contract\IProductGetClientIdUseCase;
use App\Exceptions\MensagemDetails;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
use Throwable;

class ProductGetClientIdController extends Controller
{
    private $productUseCase;

    public function __construct(IProductGetClientIdUseCase $productUseCase)
    {
        $this->productUseCase = $productUseCase;
    }

    public function __invoke(string $id): JsonResponse
    {
        try {

            $products = $this->productUseCase->execute($id);

            if (is_null($products)) {
                throw new NotFoundException('Not client found', 404);
            }

            $products = ProductResource::collection($products);

            return response()->json(['data' => $products], 200);

        } catch (NotFoundException $e) {

            $erroDetails = new MensagemDetails($e->getMessage(), 'warning', 404);

            return response()->json($erroDetails->toArray(), 404);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?: 500);
        }
    }
}
