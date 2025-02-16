<?php

namespace App\Infrastructure\Product\Repository;

use App\Infrastructure\Product\Base\ProductAllAbstractRepository;
use App\Infrastructure\Product\Contract\IProductAllRepository;
use App\Models\Product;

class ProductAllRepository extends ProductAllAbstractRepository implements IProductAllRepository
{
    protected $model = Product::class;
}
