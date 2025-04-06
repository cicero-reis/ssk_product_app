<?php

namespace App\Infrastructure\Product\Contract;

interface IProductGetCategoryIdRepository
{
    public function getCategoryId(int $categoryId);
}
