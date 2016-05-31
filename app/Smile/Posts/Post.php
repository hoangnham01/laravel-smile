<?php

namespace App\Smile\Posts;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = '';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
}