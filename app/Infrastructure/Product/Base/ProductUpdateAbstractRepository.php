<?php

namespace App\Infrastructure\Product\Base;

abstract class ProductUpdateAbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->model);
    }

    public function update(int $id, array $body = [])
    {
        return $this->model->find($id)->update($body);
    }
}
