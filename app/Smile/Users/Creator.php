<?php

namespace App\Smile\Users;


use App\Exceptions\TransactionException;

class Creator
{

    protected $repository;
    protected $logged;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function dataCreate()
    {
        return [];
    }

    /**
     * @param \App\Smile\Users\UserFormRequest $request
     * @param \App\Smile\Users\CreatorListener $listener
     * @return \Illuminate\Http\JsonResponse
     */
    public function userCreate(UserFormRequest $request, CreatorListener $listener)
    {
        $this->repository->beginTransaction();
        try {
            $data = $request->only(['username','email','password', 'full_name']);
            $data['password'] = bcrypt($data['password']);
            $user = $this->repository->create($data);
            event('user.create', $user);
            $this->repository->commit();
            return $listener->createSuccessful(['code' => CREATED_SUCCESS,  'msg' => trans('messages.create_success')]);
        } catch (TransactionException $e) {
            izWriteLog($e);
            $this->repository->rollBack();
            return $listener->creationFailed(['code' => CREATED_FAILED, 'msg' => trans('messages.create_failed')]);
        }
    }
}