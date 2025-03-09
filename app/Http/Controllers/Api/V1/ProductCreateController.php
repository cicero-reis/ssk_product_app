<?php

namespace App\Http\Controllers\Api\V1;

use App\Application\Dtos\ProductCreateDto;
use App\Application\UseCase\Contract\IProductCreateUseCase;
use App\Exceptions\MensagemDetails;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
use Throwable;

class ProductCreateController extends Controller
{
    private $productUseCase;

    public function __construct(IProductCreateUseCase $productUseCase)
    {
        $this->productUseCase = $productUseCase;
    }

    public function __invoke(ProductStoreRequest $request): JsonResponse
    {
        try {

            $dto = ProductCreateDto::fromArray($request);

            $product = $this->productUseCase->execute($dto);

            return response()->json([
                'data' => new ProductResource($product),
            ], 201);
        } catch (NotFoundException $e) {
            $mensagem = new MensagemDetails($e->getMessage(), 'warning', 404);
            return response()->json($mensagem->toArray(), 404);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Product not created',
                'error' => $e->getMessage(),
            ], $e->getCode() ?: 500);
        }
    }
}
