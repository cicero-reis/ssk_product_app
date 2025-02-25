<?php

use App\Application\UseCase\Contract\IProductGetByIdUseCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\getJson;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->product = Product::factory()->create();
    $this->productUseCase = Mockery::mock(IProductGetByIdUseCase::class);
    $this->app->instance(IProductGetByIdUseCase::class, $this->productUseCase);
});

describe('ProductGetByIdController', function () {

    it('should return a product successfully', function () {

        $this->productUseCase
            ->shouldReceive('execute')
            ->once()
            ->with($this->product->id)
            ->andReturn($this->product);

        $response = getJson(route('api.v1.products.get', ['id' => $this->product->id]));

        $response->assertStatus(200);
    });

    it('should return error for invalid product', function () {

        $reponse = [
            'message' => 'Not product found',
            'alertInfo' => 'danger',
            'code' => 404,
        ];

        $this->productUseCase
            ->shouldReceive('execute')
            ->once()
            ->with(2)
            ->andReturn(null);

        $response = getJson(route('api.v1.products.get', ['id' => 2]));

        $response->assertStatus(404);

        $response->assertJson($reponse);
    });
});
