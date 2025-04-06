<?php

namespace App\Infrastructure\Product\Base;

abstract class ProductGetCategoryIdAbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->model);
    }

    public function getCategoryId(int $categoryId)
    {
        return $this->model->where('category_id', $categoryId)->get();
    }
}
