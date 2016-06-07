<?php

namespace App\Smile\Accounts;


use App\Http\Requests\Request;

class AccountFormRequest extends Request
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