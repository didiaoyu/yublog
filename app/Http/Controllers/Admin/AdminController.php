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
    public function formatDataTableData($data, $draw, $recordsTotal, $isWithKey = 1)
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
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsTotal,
            'data' => $newData
        ];

        return $formatData;
    }
}