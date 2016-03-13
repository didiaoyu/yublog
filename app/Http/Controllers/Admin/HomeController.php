<?php
/**
 * Created by PhpStorm.
 * User: lixy
 * Date: 2016/3/8
 * Time: 21:51
 */

namespace App\Http\Controllers\Admin;


class HomeController extends AdminController
{
    public function index()
    {
        return view('admin.home.index');
    }
}