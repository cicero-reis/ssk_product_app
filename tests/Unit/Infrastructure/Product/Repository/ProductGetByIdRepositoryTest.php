<?php

use App\Infrastructure\Product\Repository\ProductGetByIdRepository;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

test('repository gets product by id', function () {
    // Instantiate the repository
    $repository = app(ProductGetByIdRepository::class);
    $product = Product::factory()->create();

    // Assert that the product was created
    expect($product)->not->toBeNull()
        ->toBeInstanceOf(Product::class);

    // Get product by ID
    $productById = $repository->getById($product->id);

    // Assert that the retrieved product matches the created one
    expect($productById)->not->toBeNull()
        ->toBeInstanceOf(Product::class)
        ->id->toBe($product->id);
});
