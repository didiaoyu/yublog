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
        'user_id', 'title', 'description', 'is_published', 'published_at', 'content', 'tags_id', 'view_count',
    ];
}
