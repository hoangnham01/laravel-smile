<?php

namespace App\Http\Controllers\Backend;

use App\Smile\Posts\Post;
use App\Smile\Posts\PostFormRequest;
use Illuminate\Http\Request;
use App\Smile\Posts\Data;
use App\Smile\Posts\Creator;
use App\Smile\Posts\CreatorListener;
use App\Smile\Posts\Updater;
use App\Smile\Posts\UpdaterListener;
use App\Smile\Posts\Deleter;
use App\Smile\Posts\DeleterListener;

class PostController extends BackendController implements CreatorListener, UpdaterListener,DeleterListener
{
    public function __construct(Data $data, Creator $creator, Updater $updater, Deleter $deleter)
    {
        $this->data = $data;
        $this->creator = $creator;
        $this->updater = $updater;
        $this->deleter = $deleter;
        $this->indexRouter = 'backend.posts.index';
        parent::__construct();
    }

    public function index(Request $request)
    {
        return view('backend.posts.index', $this->data->getDataBackend($request));
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function create()
    {
        return view('backend.posts.create', $this->creator->dataCreate());
    }

    public function store(PostFormRequest $request)
    {
        echo '<pre>';
        print_r($request->all());
        die;
        return $this->creator->postCreate($request, $this);
    }

    public function edit(Post $post)
    {
        return view('backend.posts.edit', $this->updater->dataEdit($post));
    }

    public function update(Post $post, PostFormRequest $request)
    {
        return $this->updater->postUpdate($request, $this, $post);
    }

    public function destroy()
    {

    }
}