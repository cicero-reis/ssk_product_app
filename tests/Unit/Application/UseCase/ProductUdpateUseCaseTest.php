<?php

namespace Tests\Unit\Application\UseCase;

use App\Application\UseCase\ProductUpdateUseCase;
use App\Infrastructure\Product\Contract\IProductUpdateRepository;
use PHPUnit\Framework\TestCase;

class ProductUpdateUseCaseTest extends TestCase
{
    public function test_product_update_use_case()
    {
        $productRepositoryMock = $this->createMock(IProductUpdateRepository::class);

        $productRepositoryMock->expects($this->once())
            ->method('update')
            ->with(1, [
                'name' => 'Product 1',
                'price' => 100,
                'description' => 'Description of Product 1',
                'category_id' => 1,
                'image_url' => 'https://example.com/image.jpg',
                'image_filename' => 'image.jpg',
            ])
            ->willReturn([
                'id' => 1,
                'name' => 'Product 1',
                'price' => 100,
                'description' => 'Description of Product 1',
                'category_id' => 1,
                'image_url' => 'https://example.com/image.jpg',
                'image_filename' => 'image.jpg',
            ]);

        $useCase = new ProductUpdateUseCase($productRepositoryMock);

        $result = $useCase->execute(1, [
            'name' => 'Product 1',
            'price' => 100,
            'description' => 'Description of Product 1',
            'category_id' => 1,
            'image_url' => 'https://example.com/image.jpg',
            'image_filename' => 'image.jpg',
        ]);

        $this->assertEquals(1, $result['id']);
    }
}
