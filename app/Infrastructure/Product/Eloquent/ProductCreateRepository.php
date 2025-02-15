<?php

namespace App\Infrastructure\Product\Eloquent;

use App\Infrastructure\Product\Base\ProductCreateAbstractRepository;
use App\Infrastructure\Product\Contract\IProductCreateRepository;
use App\Models\Product;

class ProductCreateRepository extends ProductCreateAbstractRepository implements IProductCreateRepository
{
    protected $model = Product::class;
}
