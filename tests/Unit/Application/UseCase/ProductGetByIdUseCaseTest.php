<?php

namespace Tests\Unit\Application\UseCase;

use App\Application\UseCase\ProductGetByIdUseCase;
use App\Infrastructure\Product\Contract\IProductGetByIdRepository;
use PHPUnit\Framework\TestCase;

class ProductGetByIdUseCaseTest extends TestCase
{
    public function test_product_get_by_id_use_case()
    {
        $productRepositoryMock = $this->createMock(IProductGetByIdRepository::class);

        $productRepositoryMock->expects($this->once())
            ->method('getById')
            ->with(1)
            ->willReturn([
                'id' => 1,
                'name' => 'Product 1',
                'price' => 100,
                'description' => 'Description of Product 1',
                'category_id' => 1,
                'image_url' => 'https://example.com/image.jpg',
                'image_filename' => 'image.jpg',
            ]);

        $useCase = new ProductGetByIdUseCase($productRepositoryMock);

        $result = $useCase->execute(1);

        $this->assertEquals(1, $result['id']);
    }

    public function test_product_get_by_id_use_case_throws_not_found_exception_when_no_product_found()
    {
        $productRepositoryMock = $this->createMock(IProductGetByIdRepository::class);

        $productRepositoryMock->expects($this->once())
            ->method('getById')
            ->with(1)
            ->willReturn([]);

        $useCase = new ProductGetByIdUseCase($productRepositoryMock);

        $this->expectException(\App\Exceptions\NotFoundException::class);
        $this->expectExceptionMessage('Product not found');
        $this->expectExceptionCode(404);

        $useCase->execute(1);
    }

    public function test_product_get_by_id_use_case_throws_not_found_exception_when_invalid_id()
    {
        $productRepositoryMock = $this->createMock(IProductGetByIdRepository::class);

        $useCase = new ProductGetByIdUseCase($productRepositoryMock);

        $this->expectException(\App\Exceptions\NotFoundException::class);
        $this->expectExceptionMessage('Invalid id');
        $this->expectExceptionCode(400);

        $useCase->execute(0);
    }
}
