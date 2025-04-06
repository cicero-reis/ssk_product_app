<?php

namespace App\Listeners;

use App\Application\UseCase\Contract\IProductUpdateFileNameUseCase;
use App\Events\ProductImageUploadedEvent;

class ProductImageUploadedListener
{
    protected IProductUpdateFileNameUseCase $productUpdateFileNameUseCase;

    public function __construct(IProductUpdateFileNameUseCase $productUpdateFileNameUseCase)
    {
        $this->productUpdateFileNameUseCase = $productUpdateFileNameUseCase;
    }

    /**
     * Handle the event.
     */
    public function handle(ProductImageUploadedEvent $event): void
    {
        $this->productUpdateFileNameUseCase->execute($event->productId, $event->originalName, $event->storedFileName);
    }
}
