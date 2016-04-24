<?php
/**
 * Created by PhpStorm.
 * User: lixy
 * Date: 2016/3/13
 * Time: 16:45
 */

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;

class CategoryController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $start = Input::get('start', 0);
            $length = Input::get('length', 10);
            $search = Input::get('search');
            $userDB = DB::table('category');
            if (!empty($search['value'])) {
                $userDB->where('name', 'like', '%' . $search['value'] . '%')
                    ->orWhere('alias', 'like', '%' . $search['value'] . '%');
            }
            $recordTotal = $userDB->count();
            $userList = $userDB->skip($start)->take($length)->get();
            return Response::json($this->formatDataTableData($userList, $recordTotal));
        }
        return view('admin.category.index');
    }

    //添加
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $info = $request->input('info');
            if (Category::create($info)) {
                return redirect()->to('/admin/category/index');
            } else {
                redirect()->back();
            }
        }
        return view('admin.category.add');
    }

    //修改
    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $info = $request->input('info');
            $ret = Category::where('id', $info['id'])->update($info);
            if ($ret) {
                return redirect()->to('/admin/category/index');
            } else {
                return redirect()->back();
            }
        }
        $data = Category::find($request->get('id'));
        return view('admin.category.edit', $data);
    }

    //删除
    public function delete(Request $request)
    {
        $id = (int)$request->input('id');
        if (Category::destroy($id)) {
            return redirect()->to('/admin/category/index');
        } else {
            return redirect()->back();
        }
    }
}