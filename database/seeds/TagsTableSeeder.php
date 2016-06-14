<?php

use Illuminate\Database\Seeder;
use App\Smile\Tags\TagItem;
use App\Smile\Tags\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Việt Nam', 'Hoàng Sa', 'Trường Sa'
        ];
        $tagsItems = [
            ['tag_id' => 1, 'item_id' => 1, 'type' => TAG_TYPE_POST],
            ['tag_id' => 2, 'item_id' => 1, 'type' => TAG_TYPE_POST],
            ['tag_id' => 3, 'item_id' => 1, 'type' => TAG_TYPE_POST],
            ['tag_id' => 1, 'item_id' => 2, 'type' => TAG_TYPE_POST],
            ['tag_id' => 2, 'item_id' => 2, 'type' => TAG_TYPE_POST],
            ['tag_id' => 2, 'item_id' => 3, 'type' => TAG_TYPE_POST],
            ['tag_id' => 3, 'item_id' => 3, 'type' => TAG_TYPE_POST],
            ['tag_id' => 1, 'item_id' => 4, 'type' => TAG_TYPE_POST],
        ];
        foreach($tags as $item){
            $item = ['title' => $item, 'slug' => str_slug($item)];
            Tag::create($item);
        }
        foreach($tagsItems as $item){
            TagItem::create($item);
        }
    }
}
