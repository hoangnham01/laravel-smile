<?php

namespace App\Smile\Accounts;


use Illuminate\Database\Eloquent\Model;

class Account extends Model
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