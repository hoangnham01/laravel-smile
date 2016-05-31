<?php

namespace App\Smile\Posts;


use App\Exceptions\TransactionException;

class Creator
{

    protected $repository;
    protected $logged;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function dataCreate()
    {
        return [];
    }

    /**
     * @param \App\Smile\Posts\PostFormRequest $request
     * @param \App\Smile\Posts\CreatorListener $listener
     * @return \Illuminate\Http\JsonResponse
     */
    public function postCreate(PostFormRequest $request, CreatorListener $listener)
    {
        $this->repository->beginTransaction();
        try {
            $data = $request->only([]);
            $post = $this->repository->create($data);
            event('post.create', $post);
            $this->repository->commit();
            return $listener->createSuccessful(['code' => CREATED_SUCCESS,  'msg' => trans('messages.create_success')]);
        } catch (TransactionException $e) {
            izWriteLog($e);
            $this->repository->rollBack();
            return $listener->creationFailed(['code' => CREATED_FAILED, 'msg' => trans('messages.create_failed')]);
        }
    }
}