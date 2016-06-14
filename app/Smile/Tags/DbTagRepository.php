<?php

namespace App\Smile\Tags;


use App\Smile\Core\BaseRepository;

class DbTagRepository extends BaseRepository implements TagRepositoryInterface
{

    public function __construct(Tag $tag){
        $this->model = $tag;
    }
}