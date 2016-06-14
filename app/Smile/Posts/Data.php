<?php

namespace App\Smile\Posts;


use Illuminate\Http\Request;

class Data
{

    protected $repository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /* Backend */

    public function getDataBackend(Request $request){
        $appends = $request->only(['page', 'per_page', 'search', 'sort', 'order']);
        $appends['sort'] = in_array($appends['sort'], ['id', 'title', 'status']) ? $appends['sort'] : 'id';
        $appends['order'] = strtolower($appends['order']) == 'desc' ? 'desc' : 'asc';
        $filters = [['type' => ORDER_BY, 'column' => $appends['sort'], 'value' => $appends['order']]];
        if(!empty(trim($appends['search']))){
            $filters[] = ['type' => WHERE_OR, 'column' => 'title', 'value' => "%{$appends['search']}%", 'operator' => 'LIKE'];
        }else{
            unset($appends['search']);
        }
        $posts = $this->repository->getAllWithPaginate($filters)->appends($appends);
        return [
            'posts' => $posts,
            '_from' => ($posts->currentPage() - 1) * $posts->perPage() + 1
        ];
    }

    public function getDetailBackend(Request $request){
        return [];
    }

    /* Frontend */
    public function getDataFrontend(Request $request){
        return [];
    }
}