<?php

namespace App\Smile\Users;


use App\Http\Requests\Request;

class UserFormRequest extends Request
{

    public function rules()
    {
        $rules = [
            'username'  => 'required|unique:users,username',
            'email'     => 'required|unique:users,email',
            'password'  => 'required|min:6|confirmed',
            'full_name' => 'required|max:50',
            'group_id'  => 'integer|min:0',
            'status'    => 'integer',
        ];
        if ($this->isMethod('PUT')) {
            $rules['email'] = 'required|unique:users,email,' . $this->segment(3);
        }
        return $rules;
    }

}