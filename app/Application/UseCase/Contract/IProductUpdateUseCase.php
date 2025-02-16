<?php

namespace App\Application\UseCase\Contract;

interface IProductUpdateUseCase
{
    public function execute(int $id, array $body);
}
