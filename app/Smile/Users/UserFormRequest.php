<?php

namespace App\Smile\Users;


use App\Http\Requests\Request;

class UserFormRequest extends Request
{

    public function rules()
    {
        $rules = [
            
        ];
        if ($this->isMethod('PUT')) {
            
        }
        return $rules;
    }

}