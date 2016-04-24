<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //表名称
    protected $table = 'category';

    /**
     * 可以批量赋值的字段
     * @var array
     */
    protected $fillable = [
        'name','parent_id','alias','order'
    ];

    public static function getCategory()
    {
        $category = self::orderBy('order', 'asc')->get()->toArray();
        return $category;
    }
}
