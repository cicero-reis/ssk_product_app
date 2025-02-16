<?php

use App\Infrastructure\Product\Repository\ProductAllRepository;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductAllRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_repository_returns_products()
    {
        // Create a product
        Product::factory()->count(10)->create();

        // Instantiate the repository
        $repository = app(ProductAllRepository::class);
        $products = $repository->getAll();

        // Assert to check if the repository returns products
        $this->assertNotEmpty($products);
        $this->assertCount(10, $products);
    }

    public function test_repository_returns_empty_array()
    {
        // Instantiate the repository
        $repository = app(ProductAllRepository::class);
        $products = $repository->getAll();

        // Assert to check if the repository returns an empty array
        $this->assertEmpty($products);
    }
}
