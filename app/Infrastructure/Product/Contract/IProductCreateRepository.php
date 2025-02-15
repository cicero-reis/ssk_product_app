<?php

namespace App\Infrastructure\Product\Contract;

interface IProductCreateRepository
{
    public function create(array $body);
}
