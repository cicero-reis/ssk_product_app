<?php

namespace Tests\Unit\Application\UseCase;

use App\Application\UseCase\ProductDeleteUseCase;
use App\Infrastructure\Product\Contract\IProductDeleteRepository;
use PHPUnit\Framework\TestCase;

class ProductDeleteUseCaseTest extends TestCase
{
    public function test_product_delete_use_case()
    {
        $productRepositoryMock = $this->createMock(IProductDeleteRepository::class);

        $productRepositoryMock->expects($this->once())
            ->method('delete')
            ->with(1)
            ->willReturn(true);

        $useCase = new ProductDeleteUseCase($productRepositoryMock);

        $result = $useCase->execute(1);

        $this->assertTrue($result);
    }

    public function test_product_delete_use_case_throws_not_found_exception_when_invalid_id()
    {
        $productRepositoryMock = $this->createMock(IProductDeleteRepository::class);

        $useCase = new ProductDeleteUseCase($productRepositoryMock);

        $this->expectException(\App\Exceptions\NotFoundException::class);
        $this->expectExceptionMessage('Invalid id');
        $this->expectExceptionCode(400);

        $useCase->execute(0);
    }
}
