<?php

namespace App\Smile\Posts;

use App\Exceptions\TransactionException;


class Updater
{

    protected $repository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function dataEdit(Post $post)
    {
        return [
            'post' => $post,
        ];
    }

     /**
     * @param \App\Smile\Posts\PostFormRequest $request
     * @param \App\Smile\Posts\UpdaterListener $listener
     * @param \App\Smile\Posts\Post       $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function postUpdate(PostFormRequest $request, UpdaterListener $listener, Post $post)
    {
        $this->repository->beginTransaction();
        try {
            $data = $request->only([]);
            $this->repository->update($data, ['column' => 'id', 'value' => $post->id]);
            event('post.update', $post);
            $this->repository->commit();
            return $listener->updaterSuccessful(['code' => UPDATED_SUCCESS, 'msg' => trans('messages.update_success')]);
        } catch (TransactionException $e) {
            $this->repository->rollBack();
            izWriteLog($e);
            return $listener->updaterFailed(['code' => UPDATED_FAILED, 'msg' => trans('messages.update_failed')]);
        }
    }
}