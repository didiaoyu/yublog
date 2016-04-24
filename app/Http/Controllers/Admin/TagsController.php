<?php
/**
 * Created by PhpStorm.
 * User: lixy
 * Date: 2016/3/13
 * Time: 16:45
 */

namespace App\Http\Controllers\Admin;

use App\Model\Tag;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;

class TagsController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $start = Input::get('start', 0);
            $length = Input::get('length', 10);
            $search = Input::get('search');
            $userDB = DB::table('tags');
            if (!empty($search['value'])) {
                $userDB->where('name', 'like', '%' . $search['value'] . '%');
            }
            $recordTotal = $userDB->count();
            $userList = $userDB->skip($start)->take($length)->orderBy('id', 'asc')->get();
            return Response::json($this->formatDataTableData($userList, $recordTotal));
        }
        return view('admin.tags.index');
    }

    //删除
    public function delete(Request $request)
    {
        $id = (int)$request->input('id');
        if (Tag::destroy($id)) {
            return redirect()->to('/admin/tags/index');
        } else {
            return redirect()->back();
        }
    }
}