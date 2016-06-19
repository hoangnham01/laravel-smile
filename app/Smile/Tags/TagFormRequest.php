<?php

namespace App\Smile\Tags;


use App\Http\Requests\Request;

class TagFormRequest extends Request
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