<?php

namespace App\Http\Controllers\Backend;

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
        parent::__construct();
    }

    public function index(Request $request)
    {
        return view('backend.users.index', $this->data->getDataBackend($request));
    }

    public function show()
    {

    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}