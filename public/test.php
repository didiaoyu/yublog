<?php
/**
 * Created by PhpStorm.
 * User: lixiaoyu
 * Date: 2017/4/21
 * Time: 下午4:29
 */
if (isset($_POST)) {
    echo 'post';
} elseif (isset($_GET)) {
    echo 'get';
} else {
    echo 'unknow method';
}