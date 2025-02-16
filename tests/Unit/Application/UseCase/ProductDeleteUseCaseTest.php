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
}
