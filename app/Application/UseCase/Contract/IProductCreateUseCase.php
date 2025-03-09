<?php

namespace App\Application\UseCase\Contract;

use App\Application\Dtos\ProductCreateDto;

interface IProductCreateUseCase
{
    public function execute(ProductCreateDto $dto);
}
