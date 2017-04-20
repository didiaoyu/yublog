<?php
/**
 * Created by PhpStorm.
 * User: lixiaoyu
 * Date: 2017/4/20
 * Time: 下午3:08
 */

namespace App\Http\Controllers;


class TestController extends Controller
{
    public function getParkingInfo()
    {
        $data = [
            'code' => 0,
            'parkCode' => '6DEA23BC2376F1',
            'parkName' => '海康威视二期停车场',
            'parkAddress' => '杭州市滨江区阡陌路555号',
            'contactName' => '张三',
            'contactPhone' => '18955555555',
            'longi' => '120.2',
            'lati' => '30.3',
            'description' => '每小时收费3元',
            'totalRegion' => 2,
            'regionInfos' => [
                [
                    'regionName' => '地上停车场',
                    'regionId' => 1,
                    'totalLots' => 120,
                    'currentLots' =>  60,
                ],
                [
                    'regionName' => '地下停车场',
                    'regionId' => 2,
                    'totalLots' => 50,
                    'currentLots' =>  10,
                ]
            ]
        ];
        return response()->json($data);
    }
}