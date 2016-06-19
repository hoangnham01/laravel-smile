<?php

namespace App\Smile\Tags;


use App\Smile\Core\BaseRepositoryInterface;

interface TagRepositoryInterface extends BaseRepositoryInterface
{

    /**
     * @param array  $tags
     * @param int    $itemId
     * @param string $type
     * @return mixed
     */
    public function createTags(array $tags, $itemId = 0, $type = TAG_TYPE_POST);
    /**
     * @param array  $tags
     * @param int    $itemId
     * @param string $type
     * @return mixed
     */
    public function updateTags(array $tags, $itemId = 0, $type = TAG_TYPE_POST);
    /**
     * @param int    $itemId
     * @param string $type
     * @return mixed
     */
    public function deleteTags($itemId = 0, $type = TAG_TYPE_POST);
    /**
     * @param int    $itemId
     * @param string $type
     * @return object
     */
    public function getTagsItem($itemId = 0, $type = TAG_TYPE_POST);
}
