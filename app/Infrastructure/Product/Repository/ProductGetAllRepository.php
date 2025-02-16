<?php

namespace App\Infrastructure\Product\Repository;

use App\Infrastructure\Product\Base\ProductGetAllAbstractRepository;
use App\Infrastructure\Product\Contract\IProductGetAllRepository;
use App\Models\Product;

class ProductGetAllRepository extends ProductGetAllAbstractRepository implements IProductGetAllRepository
{
    protected $model = Product::class;
}
