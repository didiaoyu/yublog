<?php
/**
 * Created by PhpStorm.
 * User: lixiaoyu
 * Date: 2017/4/21
 * Time: 下午4:29
 */
if (isset($_SERVER['REQUEST_METHOD'])) {
    echo $_SERVER['REQUEST_METHOD'];
} else {
    echo 'unknow method';
}