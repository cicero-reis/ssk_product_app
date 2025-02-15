<?php

namespace App\Infrastructure\Product\Base;

abstract class ProductGetByIdAbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->model);
    }

    public function getById(int $id)
    {
        return $this->model->find($id);
    }
}
