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

    $useCase = new ProductUpdateUseCase($productRepositoryMock);

    $result = $useCase->execute(1, [
        'name' => 'Product 1',
        'price' => 100,
        'description' => 'Description of Product 1',
        'category_id' => 1,
        'image_url' => 'https://example.com/image.jpg',
        'image_filename' => 'image.jpg',
    ]);

    expect($result['id'])->toBe(1);
});

// it('throws not found exception when invalid id', function () {
//     $productRepositoryMock = $this->createMock(IProductUpdateRepository::class);

//     $useCase = new ProductUpdateUseCase($productRepositoryMock);

//     $this->expectException(\App\Exceptions\NotFoundException::class);
//     $this->expectExceptionMessage('Invalid id');
//     $this->expectExceptionCode(400);

//     $useCase->execute(0, []);
// });

// it('throws not found exception when body is empty', function () {
//     $productRepositoryMock = $this->createMock(IProductUpdateRepository::class);

//     $useCase = new ProductUpdateUseCase($productRepositoryMock);

//     $this->expectException(\App\Exceptions\NotFoundException::class);
//     $this->expectExceptionMessage('Body is required');
//     $this->expectExceptionCode(400);

//     $useCase->execute(1, []);
// });
