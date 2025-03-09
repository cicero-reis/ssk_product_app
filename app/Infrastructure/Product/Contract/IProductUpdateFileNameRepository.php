<?php

namespace App\Infrastructure\Product\Contract;

interface IProductUpdateFileNameRepository
{
    public function updateFileName(int $id, string $originalName, string $storedFileName);
}
