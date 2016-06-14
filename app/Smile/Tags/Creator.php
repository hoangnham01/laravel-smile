<?php

namespace App\Smile\Tags;


use App\Exceptions\TransactionException;

class Creator
{

    protected $repository;
    protected $logged;

    public function __construct(TagRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function dataCreate()
    {
        return [];
    }

    /**
     * @param \App\Smile\Tags\TagFormRequest $request
     * @param \App\Smile\Tags\CreatorListener $listener
     * @return \Illuminate\Http\JsonResponse
     */
    public function tagCreate(TagFormRequest $request, CreatorListener $listener)
    {
        $this->repository->beginTransaction();
        try {
            $data = $request->only([]);
            $tag = $this->repository->create($data);
            event('tag.create', $tag);
            $this->repository->commit();
            return $listener->createSuccessful(['code' => CREATED_SUCCESS,  'msg' => trans('messages.create_success')]);
        } catch (TransactionException $e) {
            izWriteLog($e);
            $this->repository->rollBack();
            return $listener->creationFailed(['code' => CREATED_FAILED, 'msg' => trans('messages.create_failed')]);
        }
    }
}