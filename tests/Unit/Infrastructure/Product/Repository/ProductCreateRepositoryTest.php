<?php

namespace Tests\Unit\Infrastructure\Product\Repository;

use App\Infrastructure\Product\Repository\ProductCreateRepository;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCreateRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_repository_creates_product()
    {
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
        $this->assertNotEmpty($product);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals('Product 1', $product->name);
        $this->assertEquals(100, $product->price);
        $this->assertEquals('Description of Product 1', $product->description);
    }
}
