<?php

namespace App\Smile\Posts;


use App\Smile\Core\BaseRepository;

class DbPostRepository extends BaseRepository implements PostRepositoryInterface
{

    public function __construct(Post $post){
        $this->model = $post;
    }
}