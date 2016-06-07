<?php

namespace App\Smile\Accounts;


use App\Exceptions\TransactionException;

class Deleter
{

    protected $repository;
    protected $logged;

    public function __construct(AccountRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Smile\Accounts\Account $account
     * @param \App\Smile\Accounts\DeleterListener $listener
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Account $account, DeleterListener $listener){
        $this->repository->beginTransaction();
        try {
            $account->delete();
            event('account.delete', $account);
            return $listener->deleteSuccessful();
        } catch (TransactionException $e) {
            $this->repository->rollBack();
            izWriteLog($e);
            return $listener->deleteFailed(['code' => DELETED_FAILED, 'msg' => trans('messages.delete_failed')]);
        }
    }
}