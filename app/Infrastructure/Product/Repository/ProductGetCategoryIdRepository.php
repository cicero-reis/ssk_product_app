<?php

namespace App\Infrastructure\Product\Repository;

use App\Infrastructure\Product\Base\ProductGetCategoryIdAbstractRepository;
use App\Infrastructure\Product\Contract\IProductGetCategoryIdRepository;
use App\Models\Product;

class ProductGetCategoryIdRepository extends ProductGetCategoryIdAbstractRepository implements IProductGetCategoryIdRepository
{
    protected $model = Product::class;
}
