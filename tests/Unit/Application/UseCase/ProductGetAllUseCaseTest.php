<?php

use App\Application\UseCase\ProductGetAllUseCase;
use App\Infrastructure\Product\Contract\IProductGetAllRepository;

it('calls repository with correct parameters', function () {
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

    expect($result)->toBeArray();
});
