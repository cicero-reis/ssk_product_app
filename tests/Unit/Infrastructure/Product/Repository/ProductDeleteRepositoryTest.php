<?php

namespace Tests\Unit\Infrastructure\Product\Repository;

use App\Infrastructure\Product\Repository\ProductDeleteRepository;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductDeleteRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_repository_deletes_product()
    {
        // Instantiate the repository
        $repository = app(ProductDeleteRepository::class);
        $product = Product::factory()->create();

        // Assert to check if the repository deletes a product
        $this->assertNotEmpty($product);
        $this->assertInstanceOf(Product::class, $product);

        $repository->delete($product->id);

        $this->assertEmpty(Product::find($product->id));
    }
}
