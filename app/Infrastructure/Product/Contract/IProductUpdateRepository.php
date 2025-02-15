<?php

namespace App\Infrastructure\Product\Contract;

interface IProductUpdateRepository
{
    public function update(int $id, array $body);
}
