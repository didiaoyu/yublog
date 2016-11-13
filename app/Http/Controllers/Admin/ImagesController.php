<?php
/**
 * Created by PhpStorm.
 * User: lixy
 * Date: 2016/3/13
 * Time: 16:45
 */

namespace App\Http\Controllers\Admin;


use App\Http\Library\Helper;
use App\Model\Article;
use App\Model\Category;
use App\Model\TagsRelation;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Response;

class ImagesController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $start = Input::get('start', 0);
            $length = Input::get('length', 10);
            $search = Input::get('search');
            $DB = DB::table('articles');
            if (!empty($search['value'])) {
                $DB->where('articles.title', 'like', '%' . $search['value'] . '%');
            }
            $recordTotal = $DB->count();
            //查询文章及相关标签
            $articleList = $DB->leftJoin('tags_relations', 'articles.id', '=', 'tags_relations.article_id')
                ->leftJoin('tags', 'tags.id', '=', 'tags_relations.tag_id')
                ->groupBy('articles.id')
                ->select(DB::raw('articles.id, articles.title, articles.view_count,articles.created_at, articles.updated_at,GROUP_CONCAT(tags.`name`) AS tags'))
                ->skip($start)
                ->take($length)
                ->get();
            return Response::json($this->formatDataTableData($articleList, $recordTotal));
        }
        return view('admin.images.index');
    }

    //添加
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $info = $request->input('info');
            if (empty($info['is_published']))
                $info['is_published'] = 0;
            $info['user_id'] = Auth::user()->id;
            $articleRes = Article::create($info);
            if ($articleRes) {
                //添加标签
                TagsRelation::manageTagRelation($articleRes->id, $request->input('tags'));
                return redirect()->to('/admin/articles/index');
            } else {
                redirect()->back();
            }
        }
        $category = Category::orderBy('order', 'asc')->get();
        return view('admin.images.add', ['category' => $category]);
    }

    //修改
    public function upload(Request $request)
    {
        $file = $request->file('file');
        //判断是否上传成功
        if ($file->isValid()) {
            $path = Helper::getUploadPath();
            $img_path = $path . Helper::getGuid() . '.' . $file->getClientOriginalExtension();
            $res = Storage::put($img_path, file_get_contents($file->getRealPath()));
            if ($res) {
                $result = ['imgpath' => $img_path];
                return response()->json($result);
            }
        }
        return response('failed', '500');
    }

    //删除
    public function delete(Request $request)
    {
        $id = (int)$request->input('id');
        if (Article::destroy($id)) {
            TagsRelation::where('article_id', $id)->delete();
            return redirect()->to('/admin/articles/index');
        } else {
            return redirect()->back();
        }
    }

}