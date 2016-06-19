<?php

use Illuminate\Database\Seeder;
use App\Smile\Categories\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            ['id' => 1, 'title' => 'Category 1', 'parent_id' => 0],
            ['id' => 2, 'title' => 'Category 2', 'parent_id' => 0],
            ['id' => 3, 'title' => 'Category 3', 'parent_id' => 0],
            ['id' => 4, 'title' => 'Category 1.1', 'parent_id' => 1],
            ['id' => 5, 'title' => 'Category 2.1', 'parent_id' => 2],
            ['id' => 6, 'title' => 'Category 1.2', 'parent_id' => 1],
            ['id' => 7, 'title' => 'Category 1.1.1', 'parent_id' => 4],
        ];
        foreach($category as $item){
            if(Category::where('id', $item['id'])->count() == 0){
                $item['slug'] = str_slug($item['title']);
                Category::create($item);
            }
        }
    }
}
