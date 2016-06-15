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
        return [
            'categories' => [
                ['id' => 1, 'title' => 'Category 1', 'mask' => ''],
                ['id' => 2, 'title' => 'Category 1.1', 'mask' => '|--'],
                ['id' => 3, 'title' => 'Category 1.2', 'mask' => '|--'],
                ['id' => 4, 'title' => 'Category 2', 'mask' => ''],
                ['id' => 5, 'title' => 'Category 2.1', 'mask' => '|--'],
                ['id' => 6, 'title' => 'Category 2.1.2', 'mask' => '|----'],
            ],
            'layouts' => config('theme.setting.layouts', [])
        ];
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