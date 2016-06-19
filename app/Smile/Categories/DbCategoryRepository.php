<?php

namespace App\Smile\Categories;


use App\Smile\Core\BaseRepository;

class DbCategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getAllCategory($column = array('id', 'title', 'parent_id', 'slug'))
    {
        $category = array();
        $this->makeTree($category, $this->getAll(array(), $column)->toArray(), 0, 0);
        return $category;
    }

    function makeTree(&$category, $data, $parentId = 0, $level = 0)
    {
        foreach ($data as $item) {
            if ($item['parent_id'] == $parentId) {
                $item['level'] = $level;
                $category[] = $item;
                $this->makeTree($category, $data, $item['id'], $level + 1);
            }
        }
    }
}