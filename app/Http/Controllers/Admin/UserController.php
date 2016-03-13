<?php
/**
 * Created by PhpStorm.
 * User: lixy
 * Date: 2016/3/13
 * Time: 16:45
 */

namespace App\Http\Controllers\Admin;


use App\User;
use DB;
use Illuminate\Support\Facades\Input;
use Response;

class UserController extends AdminController
{
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * 获取用户列表
     */
    public function userList()
    {
        $draw = Input::get('draw', 1);
        $start = Input::get('start', 0);
        $length = Input::get('length', 10);
        $search = Input::get('search');
        $userDB = DB::table('users');
        if (!empty($search['value'])) {
            $userDB->where('name', 'like', '%' . $search['value'] . '%')
            ->orWhere('email', 'like', '%' . $search['value'] . '%');
        }
        $recordTotal = $userDB->count();
        $userList = $userDB->skip($start)->take($length)->get();
        return Response::json($this->formatDataTableData($userList, $draw, $recordTotal));
    }
}