<?php
/**
 * Created by PhpStorm.
 * User: lixy
 * Date: 2016/3/13
 * Time: 16:45
 */

namespace App\Http\Controllers\Admin;


use App\Model\Article;
use App\Model\Category;
use App\Model\Tag;
use App\Model\TagsRelation;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;

class ArticlesController extends AdminController
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
        return view('admin.article.index');
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
        return view('admin.article.add', ['category' => $category]);
    }

    //修改
    public function edit(Request $request)
    {
        //保存修改
        if ($request->isMethod('post')) {
            $info = $request->input('info');
            if (empty($info['is_published']))
                $info['is_published'] = 0;
            $ret = Article::where('id', $info['id'])->update($info);
            if ($ret) {
                TagsRelation::manageTagRelation($info['id'], $request->input('tags'), 1);
                return redirect()->to('/admin/articles/index');
            } else {
                return redirect()->back();
            }
        }

        //查询要修改的文章
        $articleInfo = (array)DB::table('articles')
            ->leftJoin('tags_relations', 'articles.id', '=', 'tags_relations.article_id')
            ->leftJoin('tags', 'tags.id', '=', 'tags_relations.tag_id')
            ->groupBy('articles.id')
            ->select(DB::raw('articles.id, articles.cate_id, articles.title, articles.description, articles.view_count,
            articles.content, articles.is_published, articles.published_at,GROUP_CONCAT(tags.`name`) AS tags'))
            ->where('articles.id', $request->input('id'))
            ->first();
        $category = Category::orderBy('order', 'asc')->get();
        return view('admin.article.edit', ['articleInfo' => $articleInfo, 'category' => $category]);
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