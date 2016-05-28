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
        return [];
    }

    public function getDetailBackend(Request $request){
        return [];
    }

    /* Frontend */
    public function getDataFrontend(Request $request){
        return [];
    }
}