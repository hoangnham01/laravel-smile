<?php

namespace App\Smile\Categories;


use App\Exceptions\TransactionException;

class Creator
{

    protected $repository;
    protected $logged;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function dataCreate()
    {
        return [];
    }

    /**
     * @param \App\Smile\Categories\CategoryFormRequest $request
     * @param \App\Smile\Categories\CreatorListener $listener
     * @return \Illuminate\Http\JsonResponse
     */
    public function categoryCreate(CategoryFormRequest $request, CreatorListener $listener)
    {
        $this->repository->beginTransaction();
        try {
            $data = $request->only([]);
            $category = $this->repository->create($data);
            event('category.create', $category);
            $this->repository->commit();
            return $listener->createSuccessful(['code' => CREATED_SUCCESS,  'msg' => trans('messages.create_success')]);
        } catch (TransactionException $e) {
            izWriteLog($e);
            $this->repository->rollBack();
            return $listener->creationFailed(['code' => CREATED_FAILED, 'msg' => trans('messages.create_failed')]);
        }
    }
}