<?php

use App\Application\UseCase\Contract\IProductGetAllUseCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\getJson;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->product = Product::factory()->create();
    $this->productUseCase = Mockery::mock(IProductGetAllUseCase::class);
    $this->app->instance(IProductGetAllUseCase::class, $this->productUseCase);
});

describe('ProductGetAllControllerTest', function () {

    it('should return a product successfully', function () {

        $this->productUseCase
            ->shouldReceive('execute')
            ->once()
            ->andReturn([$this->product]);

        $response = getJson(route('api.v1.products.all'));

        $response->assertStatus(200);
    });

    it('should return error for invalid product', function () {

        $reponse = [
            'message' => 'Product not found',
            'alertInfo' => 'warning',
            'code' => 404,
        ];

        $this->productUseCase
            ->shouldReceive('execute')
            ->once()
            ->andReturn([]);

        $response = getJson(route('api.v1.products.all'));

        $response->assertStatus(404);

        $response->assertJson($reponse);
    });
});
