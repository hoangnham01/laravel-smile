<?php

namespace App\Smile\Logs;


use App\Smile\Core\BaseRepository;

class DbLogRepository extends BaseRepository implements LogRepositoryInterface
{

    public function __construct(Log $log){
        $this->model = $log;
    }
}