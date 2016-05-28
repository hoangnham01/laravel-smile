<?php

namespace App\Smile\Users;


use App\Smile\Core\BaseRepository;

class DbUserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct(User $user){
        $this->model = $user;
    }
}