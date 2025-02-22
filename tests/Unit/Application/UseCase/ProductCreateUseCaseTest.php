<?php

use App\Application\UseCase\ProductCreateUseCase;
use App\Infrastructure\Product\Contract\IProductCreateRepository;

it('tests product create use case', function () {
    $productRepositoryMock = $this->createMock(IProductCreateRepository::class);

    $productRepositoryMock->expects($this->once())
        ->method('create')
        ->with([
            'name' => 'Product 1',
            'price' => 100,
            'description' => 'Description of Product 1',
            'category_id' => 1,
            'image_url' => 'https://example.com/image.jpg',
            'image_filename' => 'image.jpg',
        ])
        ->willReturn([
            'id' => 1,
            'name' => 'Product 1',
            'price' => 100,
            'description' => 'Description of Product 1',
            'category_id' => 1,
            'image_url' => 'https://example.com/image.jpg',
            'image_filename' => 'image.jpg',
        ]);

    $useCase = new ProductCreateUseCase($productRepositoryMock);

    $result = $useCase->execute([
        'name' => 'Product 1',
        'price' => 100,
        'description' => 'Description of Product 1',
        'category_id' => 1,
        'image_url' => 'https://example.com/image.jpg',
        'image_filename' => 'image.jpg',
    ]);

    expect($result['id'])->toBe(1);
});
