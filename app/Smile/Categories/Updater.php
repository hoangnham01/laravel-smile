<?php

namespace App\Smile\Categories;

use App\Exceptions\TransactionException;


class Updater
{

    protected $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function dataEdit(Category $category)
    {
        return [
            'category' => $category,
        ];
    }

     /**
     * @param \App\Smile\Categories\CategoryFormRequest $request
     * @param \App\Smile\Categories\UpdaterListener $listener
     * @param \App\Smile\Categories\Category       $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function categoryUpdate(CategoryFormRequest $request, UpdaterListener $listener, Category $category)
    {
        $this->repository->beginTransaction();
        try {
            $data = $request->only([]);
            $this->repository->update($data, ['column' => 'id', 'value' => $category->id]);
            event('category.update', $category);
            $this->repository->commit();
            return $listener->updaterSuccessful(['code' => UPDATED_SUCCESS, 'msg' => trans('messages.update_success')]);
        } catch (TransactionException $e) {
            $this->repository->rollBack();
            izWriteLog($e);
            return $listener->updaterFailed(['code' => UPDATED_FAILED, 'msg' => trans('messages.update_failed')]);
        }
    }
}