<?php

use App\Infrastructure\Product\Repository\ProductCreateRepository;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    // Você pode adicionar alguma configuração aqui, se necessário
});

test('repository creates product', function () {
    // Instantiate the repository
    $repository = app(ProductCreateRepository::class);

    $product = $repository->create([
        'name' => 'Product 1',
        'price' => 100,
        'description' => 'Description of Product 1',
        'category_id' => 1,
        'image_url' => 'https://example.com/image.jpg',
        'image_filename' => 'image.jpg',
    ]);

    // Assert to check if the repository creates a product
    expect($product)->not->toBeNull()
        ->toBeInstanceOf(Product::class)
        ->name->toBe('Product 1')
        ->price->toBe(100)
        ->description->toBe('Description of Product 1');
});
