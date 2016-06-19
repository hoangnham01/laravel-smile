<?php

namespace App\Smile\Categories;


use App\Smile\Core\BaseRepositoryInterface;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllCategory($column = array('*'));
}
