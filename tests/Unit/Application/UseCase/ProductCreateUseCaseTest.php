<?php

namespace Tests\Unit\Application\UseCase;

use App\Application\UseCase\ProductCreateUseCase;
use App\Infrastructure\Product\Contract\IProductCreateRepository;
use PHPUnit\Framework\TestCase;

class ProductCreateUseCaseTest extends TestCase
{
    public function test_product_create_use_case()
    {
        $productRepositoryMock = $this->createMock(IProductCreateRepository::class);

        $productRepositoryMock->expects($this->once())
            ->method('create')
            ->with([
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

        $useCase = new ProductCreateUseCase($productRepositoryMock);

        $result = $useCase->execute([
            'name' => 'Product 1',
            'price' => 100,
            'description' => 'Description of Product 1',
            'category_id' => 1,
            'image_url' => 'https://example.com/image.jpg',
            'image_filename' => 'image.jpg',
        ]);

        $this->assertEquals(1, $result['id']);
    }

    // public function test_product_create_use_case_throws_invalid_argument_exception_when_invalid_data()
    // {
    //     $productRepositoryMock = $this->createMock(IProductCreateRepository::class);

    //     $useCase = new ProductCreateUseCase($productRepositoryMock);

    //     $this->expectException(\App\Exceptions\NotFoundException::class);
    //     $this->expectExceptionMessage('Body is required');
    //     $this->expectExceptionCode(400);

    //     $useCase->execute([]);
    // }
}
