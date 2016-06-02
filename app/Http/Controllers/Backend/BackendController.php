<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    protected $data;
    protected $creator;
    protected $updater;
    protected $deleter;
    protected $indexRouter = 'backend.dashboard';

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @param array $result
     * @return mixed
     */
    public function createSuccessful($result = array())
    {
        return redirect()->route($this->indexRouter)->with($result);
    }

    /**
     * @param string|array $error
     * @return mixed
     */
    public function creationFailed($error)
    {
        return redirect()->back()->with($error);
    }

    /**
     * @param array $result
     * @return mixed
     */
    public function updaterSuccessful($result = array())
    {
        return redirect()->route($this->indexRouter)->with($result);
    }

    /**
     * @param string|array $error
     * @return mixed
     */
    public function updaterFailed($error)
    {
        return redirect()->back()->with($error);
    }

    /**
     * @param array $result
     * @return mixed
     */
    public function deleteSuccessful($result = array())
    {
        return redirect()->route($this->indexRouter)->with($result);
    }

    /**
     * @param string|array $error
     * @return mixed
     */
    public function deleteFailed($error)
    {
        return redirect()->back()->with($error);
    }
}