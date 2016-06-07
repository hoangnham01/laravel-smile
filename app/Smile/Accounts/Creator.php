<?php

namespace App\Smile\Accounts;


use App\Exceptions\TransactionException;

class Creator
{

    protected $repository;
    protected $logged;

    public function __construct(AccountRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function dataCreate()
    {
        return [];
    }

    /**
     * @param \App\Smile\Accounts\AccountFormRequest $request
     * @param \App\Smile\Accounts\CreatorListener $listener
     * @return \Illuminate\Http\JsonResponse
     */
    public function accountCreate(AccountFormRequest $request, CreatorListener $listener)
    {
        $this->repository->beginTransaction();
        try {
            $data = $request->only([]);
            $account = $this->repository->create($data);
            event('account.create', $account);
            $this->repository->commit();
            return $listener->createSuccessful(['code' => CREATED_SUCCESS,  'msg' => trans('messages.create_success')]);
        } catch (TransactionException $e) {
            izWriteLog($e);
            $this->repository->rollBack();
            return $listener->creationFailed(['code' => CREATED_FAILED, 'msg' => trans('messages.create_failed')]);
        }
    }
}