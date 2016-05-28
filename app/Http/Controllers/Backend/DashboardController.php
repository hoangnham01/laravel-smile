<?php

namespace App\Http\Controllers\Backend;
use  App\Http\Requests\Request;

class DashboardController extends BackendController
{
    public function index(Request $request){
        return view('backend.dashboard.index');
    }
}