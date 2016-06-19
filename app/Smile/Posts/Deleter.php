<?php

namespace App\Smile\Posts;


use App\Exceptions\TransactionException;

class Deleter
{

    protected $repository;
    protected $logged;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Smile\Posts\Post $post
     * @param \App\Smile\Posts\DeleterListener $listener
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Post $post, DeleterListener $listener){
        $this->repository->beginTransaction();
        try {
            $post->delete();
            event('post.delete', $post);
            return $listener->deleteSuccessful();
        } catch (TransactionException $e) {
            $this->repository->rollBack();
            izWriteLog($e);
            return $listener->deleteFailed(['code' => DELETED_FAILED, 'msg' => trans('messages.delete_failed')]);
        }
    }
}