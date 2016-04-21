<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Article;
use App\Model\Tag;
use App\Model\TagsRelation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //文章
        $articles = Article::where('is_published', '1')->paginate(config('blog.page_size'));

        //标签
        $tags = Tag::limit(30)->orderBy('created_at', 'desc')->get()->toArray();

        return view('default.home.index', ['articles' => $articles, 'tags' => $tags]);
    }

    public function detail($id)
    {
        $article = Article::find($id);
        return view('default.home.detail', $article);
    }

    //
    public function tag($id)
    {
        //文章
        $articleIdArr = TagsRelation::where('tag_id', $id)->select('article_id')->get()->toArray();
        $ids = [];
        foreach ($articleIdArr as $idArr) {
            $ids[] = $idArr['article_id'];
        }
        $articles = Article::whereIn('id', $ids)->where('is_published', '1')->paginate(config('blog.page_size'));

        //标签
        $tags = Tag::limit(30)->orderBy('created_at', 'desc')->get()->toArray();

        return view('default.home.index', ['articles' => $articles, 'tags' => $tags]);
    }
}
