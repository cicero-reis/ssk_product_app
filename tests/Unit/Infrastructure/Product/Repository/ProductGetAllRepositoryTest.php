<?php

use App\Infrastructure\Product\Repository\ProductGetAllRepository;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

test('repository returns products', function () {
    // Create products
    Product::factory()->count(10)->create();

    // Instantiate the repository
    $repository = app(ProductGetAllRepository::class);
    $products = $repository->getAll();

    // Assert to check if the repository returns products
    expect($products)->not->toBeEmpty()
        ->toHaveCount(10);
});

test('repository returns empty array', function () {
    // Instantiate the repository
    $repository = app(ProductGetAllRepository::class);
    $products = $repository->getAll();

    // Assert to check if the repository returns an empty array
    expect($products)->toBeEmpty();
});
