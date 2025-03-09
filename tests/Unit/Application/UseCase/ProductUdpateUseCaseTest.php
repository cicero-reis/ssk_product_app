<?php

use App\Application\UseCase\ProductUpdateUseCase;
use App\Infrastructure\Product\Contract\IProductUpdateRepository;

it('updates a product', function () {
    $productRepositoryMock = $this->createMock(IProductUpdateRepository::class);

    $productRepositoryMock->expects($this->once())
        ->method('update')
        ->with(1, [
            'name' => 'Product 1',
            'price' => 100,
            'description' => 'Description of Product 1',
            'category_id' => 1
        ])
        ->willReturn([
            'id' => 1,
            'name' => 'Product 1',
            'price' => 100,
            'description' => 'Description of Product 1',
            'category_id' => 1
        ]);

    $useCase = new ProductUpdateUseCase($productRepositoryMock);

    $result = $useCase->execute(1, [
        'name' => 'Product 1',
        'price' => 100,
        'description' => 'Description of Product 1',
        'category_id' => 1
    ]);

    expect($result['id'])->toBe(1);
});
