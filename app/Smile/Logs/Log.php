<?php

namespace App\Smile\Logs;


use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    protected $table = 'logs';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'content', 'ip_address', 'created_at'];
}