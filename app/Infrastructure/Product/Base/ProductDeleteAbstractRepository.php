<?php

namespace App\Infrastructure\Product\Base;

abstract class ProductDeleteAbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->model);
    }

    public function delete(int $id)
    {
        return $this->model->destroy($id);
    }
}
