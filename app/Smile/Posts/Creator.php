<?php

namespace App\Smile\Posts;


use App\Exceptions\TransactionException;
use App\Smile\Categories\CategoryRepositoryInterface;
use App\Smile\Tags\TagRepositoryInterface;
use Auth;

class Creator
{
    protected $repository, $tag, $category;

    public function __construct(PostRepositoryInterface $repository, TagRepositoryInterface $tag, CategoryRepositoryInterface $category)
    {
        $this->repository = $repository;
        $this->category = $category;
        $this->tag = $tag;
    }

    public function dataCreate()
    {
        return [
            'categories' => $this->category->getAllCategory(),
            'layouts'    => config('theme.setting.layouts', []),
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
            $data = $request->only(['title', 'slug', 'content', 'category_id', 'status']);
            $data['user_id'] = Auth::user()->id;
            $data['slug'] = str_slug($data['slug']);
            $data['options'] = json_encode(['layout' => $request->input('options_layout')]);
            $data['thumbnail'] = uploadFile('thumbnail', PATH_UPLOAD_POSTS);
            $post = $this->repository->create($data);
            $this->tag->createTags(explode(',', $request->input('tags')), $post->id, TAG_TYPE_POST);
            event('post.create', $post);
            $this->repository->commit();
            return $listener->createSuccessful(['code' => CREATED_SUCCESS, 'msg' => trans('messages.create_success')]);
        } catch (TransactionException $e) {
            izWriteLog($e);
            $this->repository->rollBack();
            return $listener->creationFailed(['code' => CREATED_FAILED, 'msg' => trans('messages.create_failed')]);
        }
    }
}