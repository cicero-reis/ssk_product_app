<?php

namespace Tests\Unit\Infrastructure\Product\Repository;

use App\Infrastructure\Product\Repository\ProductGetByIdRepository;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductGetByIdRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_repository_gets_product_by_id()
    {
        // Instantiate the repository
        $repository = app(ProductGetByIdRepository::class);
        $product = Product::factory()->create();

        // Assert to check if the repository gets a product by id
        $this->assertNotEmpty($product);
        $this->assertInstanceOf(Product::class, $product);

        $productById = $repository->getById($product->id);

        $this->assertNotEmpty($productById);
        $this->assertInstanceOf(Product::class, $productById);
        $this->assertEquals($product->id, $productById->id);
    }
}
