<?php

namespace App\Infrastructure\Product\Repository;

use App\Infrastructure\Product\Base\ProductGetClientIdAbstractRepository;
use App\Infrastructure\Product\Contract\IProductGetClientIdRepository;
use App\Models\Product;

class ProductGetClientIdRepository extends ProductGetClientIdAbstractRepository implements IProductGetClientIdRepository
{
    protected $model = Product::class;
}
