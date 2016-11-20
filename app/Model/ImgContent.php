<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImgContent extends Model
{
    //表明
    protected $table = 'img_content';

    public $timestamps = false;
    protected $primaryKey = 'content_id';

    /**
     * 不可以批量赋值的字段
     * @var array
     */
    protected $guarded = ['content_id'];
}
