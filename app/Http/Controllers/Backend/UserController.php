<?php

namespace App\Http\Controllers\Backend;

use App\Smile\Users\User;
use App\Smile\Users\UserFormRequest;
use Illuminate\Http\Request;
use App\Smile\Users\Data;
use App\Smile\Users\Creator;
use App\Smile\Users\CreatorListener;
use App\Smile\Users\Updater;
use App\Smile\Users\UpdaterListener;
use App\Smile\Users\Deleter;
use App\Smile\Users\DeleterListener;

class UserController extends BackendController implements CreatorListener, UpdaterListener,DeleterListener
{
    public function __construct(Data $data, Creator $creator, Updater $updater, Deleter $deleter)
    {
        $this->data = $data;
        $this->creator = $creator;
        $this->updater = $updater;
        $this->deleter = $deleter;
        $this->indexRouter = 'backend.users.index';
        parent::__construct();
    }

    public function index(Request $request)
    {
        return view('backend.users.index', $this->data->getDataBackend($request));
    }

    public function show(User $user)
    {
        return $user;
    }

    public function create()
    {
        return view('backend.users.create', $this->creator->dataCreate());
    }

    public function store(UserFormRequest $request)
    {
        return $this->creator->userCreate($request, $this);
    }

    public function edit(User $user)
    {
        return view('backend.users.edit', $this->updater->dataEdit($user));
    }

    public function update(User $user, UserFormRequest $request)
    {
    }

    public function destroy()
    {

    }
}