<?php

namespace App\Http\Controllers;

use App\Application\UseCase\Contract\IProductGetAllUseCase;
use App\Exceptions\MensagemDetails;
use App\Exceptions\NotFoundException;
use App\Http\Resources\ProductCollection;
use Illuminate\Http\Request;

class ProductGetAllController extends Controller
{
    protected $productUseCase;

    public function __construct(IProductGetAllUseCase $productUseCase)
    {
        $this->productUseCase = $productUseCase;
    }

    public function __invoke(Request $request)
    {
        try {
            $body = $request->all();

            return new ProductCollection($this->productUseCase->execute($body));

        } catch (NotFoundException $e) {

            $erroDetails = new MensagemDetails(
                $e->getMessage(),
                'danger',
                $e->getCode()
            );

            return response()->json($erroDetails, $e->getCode());

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }
}
