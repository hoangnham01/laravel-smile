<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;

class DashboardController extends BackendController
{
    public function index(Request $request){
        return view('backend.dashboard.index');
    }
}