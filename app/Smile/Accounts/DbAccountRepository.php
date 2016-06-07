<?php

namespace App\Smile\Accounts;


use App\Smile\Core\BaseRepository;

class DbAccountRepository extends BaseRepository implements AccountRepositoryInterface
{

    public function __construct(Account $account){
        $this->model = $account;
    }
}