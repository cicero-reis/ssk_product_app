<?php

namespace App\Application\UseCase\Contract;

interface IProductCreateUseCase
{
    public function execute(array $body);
}
