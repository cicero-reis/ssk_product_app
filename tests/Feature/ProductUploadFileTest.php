<?php

use App\Application\UseCase\Contract\IProductUploadFileServiceUseCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\postJson;

uses(RefreshDatabase::class);

// Antes de rodar os testes
beforeEach(function () {
    $this->product = Product::factory()->create();
    Storage::fake('s3'); // Fake para o S3
    $this->mockService = Mockery::mock(IProductUploadFileServiceUseCase::class);
    $this->app->instance(IProductUploadFileServiceUseCase::class, $this->mockService);
});

describe('ProductUploadFileTest', function () {

    it('should upload an image successfully', function () {
        $id = $this->product->id;
        $file = UploadedFile::fake()->image('product.jpg', 500, 500);

        $this->mockService
            ->shouldReceive('execute')
            ->once()
            ->andReturn(['fileName' => 'product_1.jpg']);

        $response = postJson(route('api.v1.products.upload', ['id' => $id]), [
            'image' => $file,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Image uploaded',
                'data' => ['fileName' => 'product_1.jpg'],
            ]);
    });

    it('should return validation error if no file is provided', function () {
        $id = $this->product->id;

        $response = postJson(route('api.v1.products.upload', ['id' => $id]), []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['image']);
    });

    it('should return validation error for invalid file type', function () {
        $id = $this->product->id;
        $file = UploadedFile::fake()->create('document.pdf', 500, 'application/pdf');

        $response = postJson(route('api.v1.products.upload', ['id' => $id]), [
            'image' => $file,
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['image']);
    });

    it('should return status 500 if there is a connection failure', function () {
        $id = $this->product->id;
        $file = UploadedFile::fake()->image('product.jpg', 500, 500);

        Http::fake([
            'http://192.168.152.43:3001/s3/upload' => Http::response([], 500),
        ]);

        $response = postJson(route('api.v1.products.upload', ['id' => $id]), [
            'image' => $file,
        ]);

        $response->assertStatus(500);
    });
});
