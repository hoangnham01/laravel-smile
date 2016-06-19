<?php

namespace App\Smile\Users;


use App\Http\Requests\Request;

class UserFormRequest extends Request
{

    public function rules()
    {
        $rules = [
            'username'  => 'required|min:4|max:20|regex:/^(?=.{8,20}$)(?![_.0-9])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/|unique:users,username',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6|confirmed',
            'full_name' => 'required|max:50',
            'group_id'  => 'integer|min:0',
            'status'    => 'integer',
        ];
        if ($this->isMethod('PUT')) {
            unset($rules['username']);
            unset($rules['password']);
            $rules['email'] = 'required|unique:users,email,' . $this->segment(3);
        }
        return $rules;
    }

}