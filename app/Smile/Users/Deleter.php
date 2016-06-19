<?php

namespace App\Smile\Users;


use App\Exceptions\TransactionException;

class Deleter
{

    protected $repository;
    protected $logged;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Smile\Users\User $user
     * @param \App\Smile\Users\DeleterListener $listener
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user, DeleterListener $listener){
        $this->repository->beginTransaction();
        try {
            $user->delete();
            event('user.delete', $user);
            return $listener->deleteSuccessful();
        } catch (TransactionException $e) {
            $this->repository->rollBack();
            izWriteLog($e);
            return $listener->deleteFailed(['code' => DELETED_FAILED, 'msg' => trans('messages.delete_failed')]);
        }
    }
}