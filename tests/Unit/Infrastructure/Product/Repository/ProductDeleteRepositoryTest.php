<?php

use App\Infrastructure\Product\Repository\ProductDeleteRepository;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

test('repository deletes product', function () {
    // Instantiate the repository
    $repository = app(ProductDeleteRepository::class);
    $product = Product::factory()->create();

    // Assert that the product exists
    expect($product)->not->toBeNull()
        ->toBeInstanceOf(Product::class);

    // Delete the product
    $repository->delete($product->id);

    // Assert that the product no longer exists
    expect(Product::find($product->id))->toBeNull();
});
