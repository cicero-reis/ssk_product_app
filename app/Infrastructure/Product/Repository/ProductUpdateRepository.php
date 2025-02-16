<?php

namespace App\Infrastructure\Product\Repository;

use App\Infrastructure\Product\Base\ProductUpdateAbstractRepository;
use App\Infrastructure\Product\Contract\IProductUpdateRepository;
use App\Models\Product;

class ProductUpdateRepository extends ProductUpdateAbstractRepository implements IProductUpdateRepository
{
    protected $model = Product::class;
}
