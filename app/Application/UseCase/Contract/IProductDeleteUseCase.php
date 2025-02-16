<?php

namespace App\Application\UseCase\Contract;

interface IProductDeleteUseCase
{
    public function execute(int $id);
}
