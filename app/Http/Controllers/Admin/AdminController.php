<?php
/**
 * Created by PhpStorm.
 * User: lixy
 * Date: 2016/3/8
 * Time: 21:48
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * 格式化jquery-datatable返回的数据
     * @param array $data 数据库查询到的数据
     * @param int $recordsTotal 数据总条数
     * @param int $isWithKey 是否返回键值
     * @return array
     */
    public function formatDataTableData($data, $recordsTotal, $isWithKey = 1)
    {
        $newData = [];
        if (!$isWithKey) {
            foreach ($data as $d) {
                $newData[] = array_values($d);
            }
        } else {
            $newData = $data;
        }
        $formatData = [
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsTotal,
            'data' => $newData
        ];

        return $formatData;
    }
}