<?php

namespace App\Smile\Users;

use App\Exceptions\TransactionException;


class Updater
{

    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function dataEdit(User $user)
    {
        return [
            'user' => $user,
        ];
    }

     /**
     * @param \App\Smile\Users\UserFormRequest $request
     * @param \App\Smile\Users\UpdaterListener $listener
     * @param \App\Smile\Users\User       $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function userUpdate(UserFormRequest $request, UpdaterListener $listener, User $user)
    {
        $this->repository->beginTransaction();
        try {
            $data = $request->only(['email', 'full_name']);
            $this->repository->update($data, ['column' => 'id', 'value' => $user->id]);
            event('user.update', $user);
            $this->repository->commit();
            return $listener->updaterSuccessful(['code' => UPDATED_SUCCESS, 'msg' => trans('messages.update_success')]);
        } catch (TransactionException $e) {
            $this->repository->rollBack();
            izWriteLog($e);
            return $listener->updaterFailed(['code' => UPDATED_FAILED, 'msg' => trans('messages.update_failed')]);
        }
    }
}