<?php

namespace App\Infrastructure\Product\Repository;

use App\Infrastructure\Product\Base\ProductUpdateFileNameAbstractRepository;
use App\Infrastructure\Product\Contract\IProductUpdateFileNameRepository;
use App\Models\Product;

class ProductUpdateFileNameRepository extends ProductUpdateFileNameAbstractRepository implements IProductUpdateFileNameRepository
{
    protected $model = Product::class;
}
