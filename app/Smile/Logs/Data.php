<?php

namespace App\Smile\Logs;


use Illuminate\Http\Request;

class Data
{

    protected $repository;

    public function __construct(LogRepositoryInterface $repository)
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