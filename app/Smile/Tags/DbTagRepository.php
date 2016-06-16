<?php

namespace App\Smile\Tags;


use App\Smile\Core\BaseRepository;

class DbTagRepository extends BaseRepository implements TagRepositoryInterface
{
    protected $tagItem;

    public function __construct(Tag $tag, TagItem $tagItem){
        $this->model = $tag;
        $this->tagItem = $tagItem;
    }

    public function createTags(array $tags, $itemId = 0, $type = TAG_TYPE_POST)
    {
        $tagsItems = array();
        foreach($tags as $tag){
            $tag = preg_replace('/\s\s+/', ' ', trim($tag));
            if($item = $this->getFirst(['column' => 'title', 'value' => $tag])){
                array_push($tagsItems, array('tag_id' => $item->id, 'item_id' => $itemId, 'type' => $type));
            }else{
                $item = $this->create(array('title' => $tag, 'slug' => str_slug($tag)));
                array_push($tagsItems, array('tag_id' => $item->id, 'item_id' => $itemId, 'type' => $type));
            }
        }
        if(!empty($tagsItems)){
            $this->tagItem->insert($tagsItems);
        }
        return $tagsItems;
    }

    public function updateTags(array $tags, $itemId = 0, $type = TAG_TYPE_POST)
    {
        $tagsItems = array();
        foreach($tags as $tag){
            $tag = preg_replace('/\s\s+/', ' ', trim($tag));
            if($item = $this->getFirst(['column' => 'title', 'value' => $tag])){
                array_push($tagsItems, array('tag_id' => $item->id, 'item_id' => $itemId, 'type' => $type));
            }else{
                $item = $this->create(array('title' => $tag, 'slug' => str_slug($tag)));
                array_push($tagsItems, array('tag_id' => $item->id, 'item_id' => $itemId, 'type' => $type));
            }
        }
        $this->deleteTags($itemId, $type);
        if(!empty($tagsItems)){
            $this->tagItem->insert($tagsItems);
        }
        return $tagsItems;
    }

    public function deleteTags($itemId = 0, $type = TAG_TYPE_POST)
    {
        $tags = $this->tagItem->where('item_id', $itemId)->where('type', $type)->groupBy('tag_id')->get(['tag_id', \DB::raw('count(tag_id) as count')]);
        $this->tagItem->where('item_id', $itemId)->where('type', $type)->delete();
        $deleteTags = [];
        foreach($tags as $item){
            if($item->count == 1){
                array_push($deleteTags, $item->tag_id);
            }
        }
        if(!empty($deleteTags)){
            $this->model->delete(['column' => 'id', 'value' => $deleteTags, 'operator' => 'IN']);
        }

    }

    public function getTagsItem($itemId = 0, $type = TAG_TYPE_POST)
    {
        return $this->tagItem->rightJoin('tags', 'tags.id', '=', 'tags_items.tag_id')
            ->where('tags_items.item_id', $itemId)->where('tags_items.type', $type)
            ->get(['tags.title', 'tags.slug']);
    }


}