<?php

namespace Tests\Unit\Application\UseCase;

use App\Application\UseCase\ProductGetAllUseCase;
use App\Infrastructure\Product\Contract\IProductGetAllRepository;
use PHPUnit\Framework\TestCase;

class ProductGetAllUseCaseTest extends TestCase
{
    public function test_execute_calls_repository_with_correct_parameters()
    {
        $productRepositoryMock = $this->createMock(IProductGetAllRepository::class);

        $productRepositoryMock->expects($this->once())
            ->method('getAll')
            ->with($this->equalTo(['param1' => 'value1']))
            ->willReturn([
                'id' => 1,
                'name' => 'Product 1',
                'price' => 100,
                'description' => 'Description of Product 1',
                'category_id' => 1,
                'image_url' => 'https://example.com/image.jpg',
                'image_filename' => 'image.jpg',
            ]);

        $useCase = new ProductGetAllUseCase($productRepositoryMock);

        $result = $useCase->execute(['param1' => 'value1']);

        $this->assertIsArray($result);
    }

    // public function test_execute_throws_not_found_exception_when_no_products_found()
    // {
    //     $productRepositoryMock = $this->createMock(IProductGetAllRepository::class);

    //     $productRepositoryMock->expects($this->once())
    //         ->method('getAll')
    //         ->with($this->equalTo(['param1' => 'value1']))
    //         ->willReturn([]);

    //     $useCase = new ProductGetAllUseCase($productRepositoryMock);

    //     $this->expectException(\App\Exceptions\NotFoundException::class);
    //     $this->expectExceptionMessage('Not product found');
    //     $this->expectExceptionCode(404);

    //     $useCase->execute(['param1' => 'value1']);
    // }
}
