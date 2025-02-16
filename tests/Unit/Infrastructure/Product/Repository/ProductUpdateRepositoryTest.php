<?php

namespace Tests\Unit\Infrastructure\Product\Repository;

use App\Infrastructure\Product\Repository\ProductUpdateRepository;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductUpdateRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_repository_updates_product()
    {
        // Instantiate the repository
        $repository = app(ProductUpdateRepository::class);
        $product = Product::factory()->create();

        // Assert to check if the repository updates a product
        $this->assertNotEmpty($product);
        $this->assertInstanceOf(Product::class, $product);

        $productUpdated = $repository->update($product->id, [
            'name' => 'Product 2',
            'price' => 200,
            'description' => 'Description of Product 2',
        ]);

        $this->assertNotEmpty($productUpdated);
        $this->assertInstanceOf(Product::class, $productUpdated);
        $this->assertEquals('Product 2', $productUpdated->name);
        $this->assertEquals(200, $productUpdated->price);
        $this->assertEquals('Description of Product 2', $productUpdated->description);
    }
}
