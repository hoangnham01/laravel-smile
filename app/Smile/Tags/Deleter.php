<?php

namespace App\Smile\Tags;


use App\Exceptions\TransactionException;

class Deleter
{

    protected $repository;
    protected $logged;

    public function __construct(TagRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Smile\Tags\Tag $tag
     * @param \App\Smile\Tags\DeleterListener $listener
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Tag $tag, DeleterListener $listener){
        $this->repository->beginTransaction();
        try {
            $tag->delete();
            event('tag.delete', $tag);
            return $listener->deleteSuccessful();
        } catch (TransactionException $e) {
            $this->repository->rollBack();
            izWriteLog($e);
            return $listener->deleteFailed(['code' => DELETED_FAILED, 'msg' => trans('messages.delete_failed')]);
        }
    }
}