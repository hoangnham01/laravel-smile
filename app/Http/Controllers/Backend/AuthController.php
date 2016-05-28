<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends BackendController
{
    public $loginView = 'backend.accounts.login';
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
}