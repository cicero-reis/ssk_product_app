<?php

namespace App\Application\UseCase\Contract;

interface IProductUpdateFileNameUseCase
{
    public function execute(int $id, string $originalName, string $storedFileName);
}
