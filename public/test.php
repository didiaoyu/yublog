<?php
/**
 * Created by PhpStorm.
 * User: lixiaoyu
 * Date: 2017/4/21
 * Time: 下午4:29
 */
if (isset($_SERVER['REQUEST_METHOD'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        echo json_encode($data);
    } else {
        echo $_SERVER['REQUEST_METHOD'];
    }
} else {
    echo 'unknow method';
}