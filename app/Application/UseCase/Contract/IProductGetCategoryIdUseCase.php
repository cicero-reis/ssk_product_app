<?php

namespace App\Application\UseCase\Contract;

interface IProductGetCategoryIdUseCase
{
    public function execute(int $categoryId);
}
