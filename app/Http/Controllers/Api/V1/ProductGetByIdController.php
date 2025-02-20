<?php

namespace App\Http\Controllers\Api\V1;

use App\Application\UseCase\Contract\IProductGetByIdUseCase;
use App\Exceptions\MensagemDetails;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductGetByIdController extends Controller
{
    private $productUseCase;

    public function __construct(IProductGetByIdUseCase $productUseCase)
    {
        $this->productUseCase = $productUseCase;
    }

    public function __invoke(int $id)
    {
        try {

            if (! is_numeric($id) || $id <= 0) {
                throw new NotFoundException('Id invalide', 400);
            }

            $product = $this->productUseCase->execute($id);

            if (empty($products)) {
                throw new NotFoundException('Not product found', 404);
            }

            return ProductResource::collection([$product]);

        } catch (NotFoundException $e) {

            $errorDetails = new MensagemDetails(
                $e->getMessage(),
                'danger',
                $e->getCode()
            );

            return response()->json($errorDetails, $e->getCode());

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }
}
