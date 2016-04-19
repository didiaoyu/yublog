<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * 可以批量赋值的字段
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
