<?php

namespace App\Smile\Tags;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $table = 'tags';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug'];
}