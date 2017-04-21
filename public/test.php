<?php
/**
 * Created by PhpStorm.
 * User: lixiaoyu
 * Date: 2017/4/21
 * Time: 下午4:29
 */
if (!empty($_POST)) {
    echo 'post';
} elseif (!empty($_GET)) {
    echo 'get';
} else {
    echo 'unknow method';
}