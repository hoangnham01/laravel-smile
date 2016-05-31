<?php

namespace App\Smile\Users;


use Illuminate\Http\Request;

class Data
{

    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /* Backend */

    public function getDataBackend(Request $request){
        $appends = request()->only(['page', 'per_page', 'search', 'sort', 'order']);
        $appends['sort'] = in_array($appends['sort'], ['id', 'username', 'full_name']) ? $appends['sort'] : 'id';
        $appends['order'] = strtolower($appends['order']) == 'desc' ? 'desc' : 'asc';
        $filters = [['type' => ORDER_BY, 'column' => $appends['sort'], 'value' => $appends['order']]];
        if(!empty(trim($appends['search']))){
            $filters[] = ['type' => WHERE_OR, 'column' => 'full_name', 'value' => "%{$appends['search']}%", 'operator' => 'LIKE'];
            $filters[] = ['type' => WHERE_OR, 'column' => 'username', 'value' => "%{$appends['search']}%", 'operator' => 'LIKE'];
        }else{
            unset($appends['search']);
        }
        $users = $this->repository->getAllWithPaginate($filters)->appends($appends);
        return [
            'users' => $users,
            '_from' => ($users->currentPage() - 1) * $users->perPage() + 1
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