<?php

use App\Application\UseCase\Contract\IProductCreateUseCase;
use App\Http\Resources\ProductResource;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\postJson;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->productUseCase = Mockery::mock(IProductCreateUseCase::class);
    $this->app->instance(IProductCreateUseCase::class, $this->productUseCase);
});

describe('ProductCreateController', function () {

    it('should create a product successfully', function () {

        $data = [
            'name' => 'Product 1',
            'description' => 'Description of Product 1',
            'price' => 100,
            'category_id' => 1,
        ];

        $createdAt = Carbon::now()->toIso8601String();

        $this->productUseCase
            ->shouldReceive('execute')
            ->once()
            ->with($data)
            ->andReturn((object) array_merge($data, [
                'id' => 1,
                'image_filename' => null,
                'image_url' => null,
                'created_at' => $createdAt,
            ]));

        $response = postJson(route('api.v1.products.create'), $data);

        $response->assertStatus(201);

        $response->assertJson((new ProductResource((object) [
            'id' => 1,
            'name' => 'Product 1',
            'description' => 'Description of Product 1',
            'price' => 100,
            'category_id' => 1,
            'image_filename' => null,
            'image_url' => null,
            'created_at' => $createdAt,
        ]))->response()->getData(true));
    });

    it('should return error for invalid data', function () {
        $invalidData = [
            'name' => '',
            'description' => '',
            'price' => '',
            'category_id' => '',
        ];

        $response = postJson(route('api.v1.products.create'), $invalidData);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name', 'price', 'description', 'category_id']);
    });

});
