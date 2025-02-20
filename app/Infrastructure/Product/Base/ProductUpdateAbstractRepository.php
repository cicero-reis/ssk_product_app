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
        $model = $this->model->find($id);

        if ($model) {
            $model->update($body);
        }

        return $this->model->find($id);
    }
}
