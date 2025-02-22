<?php

use App\Application\UseCase\ProductDeleteUseCase;
use App\Infrastructure\Product\Contract\IProductDeleteRepository;

it('deletes a product using the use case', function () {

    $productRepositoryMock = $this->createMock(IProductDeleteRepository::class);

    $productRepositoryMock->expects($this->once())
        ->method('delete')
        ->with(1)
        ->willReturn(true);

    $useCase = new ProductDeleteUseCase($productRepositoryMock);

    $result = $useCase->execute(1);

    expect($result)->toBeTrue();
});
