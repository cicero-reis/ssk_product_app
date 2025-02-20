<?php

namespace App\Http\Controllers\Api\V1;

use App\Application\UseCase\Contract\IProductCreateUseCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Resources\ProductResource;

class ProductCreateController extends Controller
{
    private $productUseCase;

    public function __construct(IProductCreateUseCase $productUseCase)
    {
        $this->productUseCase = $productUseCase;
    }

    public function __invoke(ProductStoreRequest $request)
    {
        try {

            $body = $request->all();

            $product = $this->productUseCase->execute($body);

            return ProductResource::collection([$product]);

            return response()->json($product, 201);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }
}
