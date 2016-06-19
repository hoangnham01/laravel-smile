<?php

namespace App\Smile\Categories;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'title', 'parent_id', 'slug'];
}