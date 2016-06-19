<?php

namespace App\Smile\Logs;


use App\Http\Requests\Request;

class LogFormRequest extends Request
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