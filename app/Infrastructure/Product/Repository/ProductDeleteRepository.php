<?php

namespace App\Infrastructure\Product\Repository;

use App\Infrastructure\Product\Base\ProductDeleteAbstractRepository;
use App\Infrastructure\Product\Contract\IProductDeleteRepository;
use App\Models\Product;

class ProductDeleteRepository extends ProductDeleteAbstractRepository implements IProductDeleteRepository
{
    protected $model = Product::class;
}
