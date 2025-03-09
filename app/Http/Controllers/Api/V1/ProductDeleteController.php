<?php

namespace App\Http\Controllers\Api\V1;

use App\Application\UseCase\Contract\IProductDeleteUseCase;
use App\Exceptions\MensagemDetails;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Throwable;

class ProductDeleteController extends Controller
{
    private $productUseCase;

    public function __construct(IProductDeleteUseCase $productUseCase)
    {
        $this->productUseCase = $productUseCase;
    }

    public function __invoke(int $id): JsonResponse
    {
        try {

            if (! is_numeric($id) || $id <= 0) {
                throw new NotFoundException('Id invalide', 400);
            }

            $result = $this->productUseCase->execute($id);

            if (! $result) {
                throw new NotFoundException('Product not found', 404);
            }

            return response()->json(['message' => 'Product deleted'], 200);
        } catch (NotFoundException $e) {

            $erroDetails = new MensagemDetails($e->getMessage(), 'warning', 404);
            return response()->json($erroDetails->toArray(), 404);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?: 500);
        }
    }
}
