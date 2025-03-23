<?php

use App\Infrastructure\Product\Repository\ProductUpdateRepository;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

test('repository updates product', function () {
    // Instantiate the repository
    $repository = app(ProductUpdateRepository::class);
    $product = Product::factory()->create();

    // Assert that the product was created
    expect($product)->not->toBeNull()
        ->toBeInstanceOf(Product::class);

    // Update the product
    $productUpdated = $repository->update($product->id, [
        'name' => 'Product 2',
        'price' => 200,
        'description' => 'Description of Product 2',
        'client_id' => 'client_id',
        'category_id' => 1,
    ]);

    // Assert that the product was updated successfully
    expect($productUpdated)->not->toBeNull()
        ->toBeInstanceOf(Product::class)
        ->name->toBe('Product 2')
        ->price->toBe(200)
        ->description->toBe('Description of Product 2');
});
