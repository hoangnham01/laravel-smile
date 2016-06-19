<?php

namespace App\Smile\Posts;


use App\Http\Requests\Request;

class PostFormRequest extends Request
{

    public function rules()
    {
        $rules = [
            'title'          => 'required|max:255',
            'slug'           => 'required|max:255',
            'thumbnail'      => 'required|image',
            'content'        => 'required',
            'category_id'    => 'required|integer|min:0',
            'status'         => 'required|integer',
            'options_layout' => 'required',
        ];
        if ($this->route()->getName() === 'backend.posts.update') {
            $rules['thumbnail'] = 'image';
        }
        return $rules;
    }

}