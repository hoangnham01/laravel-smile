<?php

namespace App\Smile\Accounts;


use App\Http\Requests\Request;

class AccountFormRequest extends Request
{

    public function rules()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];
        if ($this->route()->getName() === 'backend.forgot-password') {
            $rules = ['email' => 'required|email'];
        }elseif($this->route()->getName() === 'backend.reset-password') {

        }
        return $rules;
    }

}