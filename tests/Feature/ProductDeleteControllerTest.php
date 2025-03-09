<?php

use App\Application\UseCase\Contract\IProductDeleteUseCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\deleteJson;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->product = Product::factory()->create();
    $this->productUseCase = Mockery::mock(IProductDeleteUseCase::class);
    $this->app->instance(IProductDeleteUseCase::class, $this->productUseCase);
});

describe('ProductDeleteController', function () {

    it('should delete a product successfully', function () {

        $this->productUseCase
            ->shouldReceive('execute')
            ->once()
            ->with($this->product->id)
            ->andReturn(true);

        $response = deleteJson(route('api.v1.products.delete', ['id' => $this->product->id]));

        $response->assertStatus(200);
    });

    it('should return error for invalid product', function () {

        $reponse = [
            'code' => 404,
            'alertInfo' => 'warning',
            'message' => 'Product not found',
        ];

        $this->productUseCase
            ->shouldReceive('execute')
            ->once()
            ->with(999)
            ->andReturn(false);

        $response = deleteJson(route('api.v1.products.delete', ['id' => 999]));

        $response->assertStatus(404);

        $response->assertJson($reponse);
    });
});
