<?php

namespace App\Smile\Posts;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'slug', 'thumbnail', 'content', 'category_id', 'status', 'options'];
}