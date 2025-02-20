<?php

namespace App\Http\Controllers\Api\V1;

use App\Application\UseCase\Contract\IProductDeleteUseCase;
use App\Exceptions\MensagemDetails;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use Exception;

class ProductDeleteController extends Controller
{
    private $productUseCase;

    public function __construct(IProductDeleteUseCase $productUseCase)
    {
        $this->productUseCase = $productUseCase;
    }

    public function __invoke(int $id)
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

            $errorDetails = new MensagemDetails(
                $e->getMessage(),
                'danger',
                $e->getCode()
            );

            return response()->json($errorDetails, $e->getCode());
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }
}
