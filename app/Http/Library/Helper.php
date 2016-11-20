<?php
namespace App\Http\Library;
use Illuminate\Http\Request;
use Storage;

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
        $path = config('uplaod.uplaod_dir');
        $path = str_replace('yyyy', date('Y'), $path);
        $path = str_replace('mm', date('m'), $path);
        $path = str_replace('dd', date('d'), $path);
        return $path;
    }

    /**
     * @author lixy
     * @param Request $request
     * @param string $uploader_name 上传控件的name值
     * @return array
     */
    public static function upload(Request $request, $uploader_name='file')
    {
        $file = $request->file($uploader_name);
        //判断是否上传成功
        if ($file->isValid()) {
            $path = self::getUploadPath();
            $ext = $file->getClientOriginalExtension();
            if (!in_array($ext, config('upload.allow_image_ext'))) {
                return ['status' => 100001, 'message' => '上传文件类型错误'];
            }
            $img_path = $path . self::getGuid() . '.' . $file->getClientOriginalExtension();
            $res = Storage::put($img_path, file_get_contents($file->getRealPath()));
            if ($res) {
                $result = ['status' =>1, 'image_url' => config('upload.image_host') . $img_path];
                return $result;
            }
        }
        return ['status' => 100002, 'message' => '上传失败'];
    }
}