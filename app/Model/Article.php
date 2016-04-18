<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    /**
     * 可以批量赋值的字段
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'content', 'tags_id', 'view_count',
    ];
}
