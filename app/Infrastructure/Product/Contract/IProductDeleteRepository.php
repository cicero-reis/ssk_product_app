<?php

namespace App\Infrastructure\Product\Contract;

interface IProductDeleteRepository
{
    public function delete(int $id);
}
