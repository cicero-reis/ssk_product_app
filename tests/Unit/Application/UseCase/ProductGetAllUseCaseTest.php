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
            ->willReturn([]);

        $useCase = new ProductGetAllUseCase($productRepositoryMock);

        $result = $useCase->execute(['param1' => 'value1']);

        $this->assertIsArray($result);
    }
}
