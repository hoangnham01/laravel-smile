<?php

namespace App\Smile\Posts;

use App\Exceptions\TransactionException;
use App\Smile\Tags\TagRepositoryInterface;

class Updater
{

    protected $repository, $tag;

    public function __construct(PostRepositoryInterface $repository, TagRepositoryInterface $tag)
    {
        $this->repository = $repository;
        $this->tag = $tag;
    }

    public function dataEdit(Post $post)
    {
        $post->options =json_decode($post->options);
        $tags = $this->tag->getTagsItem($post->id, TAG_TYPE_POST)->lists('title')->toArray();
        $post->tags = implode(', ', $tags);
        return [
            'post' => $post,
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
     * @param \App\Smile\Posts\UpdaterListener $listener
     * @param \App\Smile\Posts\Post       $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function postUpdate(PostFormRequest $request, UpdaterListener $listener, Post $post)
    {
        $this->repository->beginTransaction();
        try {
            $data = $request->only(['title', 'slug', 'content', 'category_id', 'status']);
            $data['slug'] = str_slug($data['slug']);
            $data['options'] = json_encode(['layout' => $request->input('options_layout')]);
            $data['thumbnail'] = uploadFile('thumbnail', PATH_UPLOAD_POSTS);
            if(empty($data['thumbnail'])){
                unset($data['thumbnail']);
            }else{
                removeFile($post->thumbnail);
            }
            $this->repository->update($data, ['column' => 'id', 'value' => $post->id]);
            $this->tag->updateTags(explode(',', $request->input('tags')), $post->id, TAG_TYPE_POST);
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