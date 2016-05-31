<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    protected $data;
    protected $creator;
    protected $updater;
    protected $deleter;

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {

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

    /**
     * @param array $result
     * @return mixed
     */
    public function createSuccessful($result = array())
    {

    }

    /**
     * @param string|array $error
     * @return mixed
     */
    public function creationFailed($error)
    {

    }

    /**
     * @param array $result
     * @return mixed
     */
    public function updaterSuccessful($result = array())
    {

    }

    /**
     * @param string|array $error
     * @return mixed
     */
    public function updaterFailed($error)
    {

    }

    /**
     * @param array $result
     * @return mixed
     */
    public function deleteSuccessful($result = array())
    {

    }

    /**
     * @param string|array $error
     * @return mixed
     */
    public function deleteFailed($error)
    {

    }
}