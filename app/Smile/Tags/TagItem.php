<?php

namespace App\Smile\Tags;


use Illuminate\Database\Eloquent\Model;

class TagItem extends Model
{
    protected $table = 'tags_items';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tag_id', 'item_id', 'type'];
}
?>