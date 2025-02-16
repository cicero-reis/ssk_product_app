<?php

namespace App\Application\UseCase\Contract;

interface IProductGetByIdUseCase
{
    public function execute(int $id);
}
