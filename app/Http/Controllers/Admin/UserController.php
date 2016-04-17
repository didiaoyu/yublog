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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;

class UserController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
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
        return view('admin.user.index');
    }

    //添加
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $info = $request->input('info');
            $info['password'] = bcrypt($info['password']);

            $user = new User();
            $user->setRawAttributes($info);
            if ($user->save()) {
                return redirect()->to('/admin/user/index');
            } else {
                redirect()->back();
            }
        }
        return view('admin.user.add');
    }

    //修改
    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $info = $request->input('info');
            if ($info['password']) {
                $info['password'] = bcrypt($info['password']);
            } else {
                unset($info['password']);
            }
            $ret = User::where('id', $info['id'])->update($info);
            if ($ret) {
                return redirect()->to('/admin/user/index');
            } else {
                return redirect()->back();
            }
        }
        $data = User::find($request->get('id'));
        return view('admin.user.edit', $data);
    }

    //删除
    public function delete(Request $request)
    {
        $id = (int)$request->input('id');
        if (User::destroy($id)) {
            return redirect()->to('/admin/user/index');
        } else {
            return redirect()->back();
        }
    }
}