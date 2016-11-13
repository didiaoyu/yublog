<?php
namespace App\Http\Library;

/**
 * Created by PhpStorm.
 * User: lixy
 * Date: 2016/11/13
 * Time: 20:20
 */
class Helper
{
    //生成GUID
    public static function getGuid()
    {
        return strtolower(md5(uniqid(mt_rand(), true)));
    }

    //格式化路径
    public static function getUploadPath()
    {
        $path = config('filesystems.uplaod.path');
        $path = str_replace('yyyy', date('Y'), $path);
        $path = str_replace('mm', date('m'), $path);
        $path = str_replace('dd', date('d'), $path);
        return $path;
    }
}