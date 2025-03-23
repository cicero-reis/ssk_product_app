<?php

namespace App\Application\UseCase\Contract;

interface IProductGetClientIdUseCase
{
    public function execute(int $id);
}
