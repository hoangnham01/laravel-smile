<?php

namespace App\Smile\Tags;

use App\Exceptions\TransactionException;


class Updater
{

    protected $repository;

    public function __construct(TagRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function dataEdit(Tag $tag)
    {
        return [
            'tag' => $tag,
        ];
    }

     /**
     * @param \App\Smile\Tags\TagFormRequest $request
     * @param \App\Smile\Tags\UpdaterListener $listener
     * @param \App\Smile\Tags\Tag       $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function tagUpdate(TagFormRequest $request, UpdaterListener $listener, Tag $tag)
    {
        $this->repository->beginTransaction();
        try {
            $data = $request->only([]);
            $this->repository->update($data, ['column' => 'id', 'value' => $tag->id]);
            event('tag.update', $tag);
            $this->repository->commit();
            return $listener->updaterSuccessful(['code' => UPDATED_SUCCESS, 'msg' => trans('messages.update_success')]);
        } catch (TransactionException $e) {
            $this->repository->rollBack();
            izWriteLog($e);
            return $listener->updaterFailed(['code' => UPDATED_FAILED, 'msg' => trans('messages.update_failed')]);
        }
    }
}