<?php

namespace App\Smile\Posts;


use App\Http\Requests\Request;

class PostFormRequest extends Request
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