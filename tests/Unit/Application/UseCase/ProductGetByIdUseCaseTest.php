<?php

use App\Application\UseCase\ProductGetByIdUseCase;
use App\Infrastructure\Product\Contract\IProductGetByIdRepository;

it('tests product get by id use case', function () {
    $productRepositoryMock = $this->createMock(IProductGetByIdRepository::class);

    $productRepositoryMock->expects($this->once())
        ->method('getById')
        ->with(1)
        ->willReturn([
            'id' => 1,
            'name' => 'Product 1',
            'price' => 100,
            'description' => 'Description of Product 1',
            'client_id' => 'client_id',
            'category_id' => 1,
        ]);

    $useCase = new ProductGetByIdUseCase($productRepositoryMock);

    $result = $useCase->execute(1);

    expect($result['id'])->toBe(1);
});
