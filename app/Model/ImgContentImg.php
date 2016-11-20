<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImgContentImg extends Model
{
    //表明
    protected $table = 'img_content_img';

    public $timestamps = false;

    /**
     * 不可以批量赋值的字段
     * @var array
     */
    protected $guarded = ['id'];
}
