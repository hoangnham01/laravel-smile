<?php

namespace App\Smile\Accounts;

use App\Exceptions\TransactionException;


class Updater
{

    protected $repository;

    public function __construct(AccountRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function dataEdit(Account $account)
    {
        return [
            'account' => $account,
        ];
    }

     /**
     * @param \App\Smile\Accounts\AccountFormRequest $request
     * @param \App\Smile\Accounts\UpdaterListener $listener
     * @param \App\Smile\Accounts\Account       $account
     * @return \Illuminate\Http\JsonResponse
     */
    public function accountUpdate(AccountFormRequest $request, UpdaterListener $listener, Account $account)
    {
        $this->repository->beginTransaction();
        try {
            $data = $request->only([]);
            $this->repository->update($data, ['column' => 'id', 'value' => $account->id]);
            event('account.update', $account);
            $this->repository->commit();
            return $listener->updaterSuccessful(['code' => UPDATED_SUCCESS, 'msg' => trans('messages.update_success')]);
        } catch (TransactionException $e) {
            $this->repository->rollBack();
            izWriteLog($e);
            return $listener->updaterFailed(['code' => UPDATED_FAILED, 'msg' => trans('messages.update_failed')]);
        }
    }
}