<?php

namespace App\Http\Controllers\Api\V1;

use App\Application\UseCase\Contract\IProductUpdateUseCase;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use Throwable;

class ProductUpdateController extends Controller
{
    private $productUseCase;

    public function __construct(IProductUpdateUseCase $productUseCase)
    {
        $this->productUseCase = $productUseCase;
    }

    public function __invoke(ProductUpdateRequest $request, int $id)
    {
        try {

            $body = $request->all();

            $product = $this->productUseCase->execute($id, $body);

            if (! $product->id) {
                throw new NotFoundException('Product not found', 404);
            }

            return ProductResource::collection([$product]);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?: 500);
        }
    }
}
