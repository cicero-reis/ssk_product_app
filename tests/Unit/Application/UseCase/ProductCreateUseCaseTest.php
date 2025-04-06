<?php

use App\Application\Dtos\ProductCreateDto;
use App\Application\UseCase\ProductCreateUseCase;
use App\Infrastructure\Product\Contract\IProductCreateRepository;

it('tests product create use case', function () {
    $productRepositoryMock = $this->createMock(IProductCreateRepository::class);

    $product = [
        'name' => 'Product 1',
        'price' => 100,
        'description' => 'Description of Product 1',
        'client_id' => 'client_id',
        'category_id' => 1,
    ];

    $productRepositoryMock->expects($this->once())
        ->method('create')
        ->with($product)
        ->willReturn(['id' => 1]);

    $useCase = new ProductCreateUseCase($productRepositoryMock);

    $dto = new ProductCreateDto('Product 1', 100, 'Description of Product 1', 'client_id', 1);

    $result = $useCase->execute($dto);

    expect($result['id'])->toBe(1);
});
