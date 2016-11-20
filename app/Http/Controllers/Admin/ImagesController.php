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
use App\Model\ImgContent;
use App\Model\ImgContentImg;
use App\Model\TagsRelation;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;

class ImagesController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $start = Input::get('start', 0);
            $length = Input::get('length', 10);
            $search = Input::get('search');
            $DB = DB::table('img_content');
            if (!empty($search['value'])) {
                $DB->where('img_content.title', 'like', '%' . $search['value'] . '%');
            }
            $recordTotal = $DB->count();
            //查询文章及相关标签
            $articleList = $DB->select(['content_id','cate_id','title','need_score','img_url','if_open','click_times'])
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
            $cover_img_info = Helper::upload($request, 'img_url');
            if ($cover_img_info['status'] == 1) {
                $info['img_url'] = $cover_img_info['image_url'];
                $info['temp_img_url'] = $cover_img_info['image_url'];
            } else {
                return redirect()->back()->withInput()->withErrors('封面图片上传失败');
            }
            DB::beginTransaction();
            $img_content_res = ImgContent::create($info);
            if ($img_content_res) {
                //添加正文图片
                $all_images = $request->get('all_images');
                $all_images_arr = explode(';', $all_images);
                $data = [];
                foreach ($all_images_arr as $image) {
                    $data[] = [
                        'content_id' => $img_content_res['content_id'],
                        'img_url' => $image
                    ];
                }
                $res = ImgContentImg::insert($data);
                if ($res) {
                    DB::commit();
                    return redirect()->to('/admin/images/index');
                }
            }
            DB::rollBack();
            return redirect()->back('/admin/articles/index')->withInput()->withErrors('添加失败');
        }
        $category = Category::orderBy('order', 'asc')->get();
        return view('admin.images.add', ['category' => $category]);
    }

    //修改
    public function edit(Request $request)
    {
        $content_id = (int)$request->get('content_id');
        if ($request->isMethod('post')) {
            $info = $request->input('info');
            if ($request->file('img_url')) {
                $cover_img_info = Helper::upload($request, 'img_url');
                if ($cover_img_info['status'] == 1) {
                    $info['img_url'] = $cover_img_info['image_url'];
                    $info['temp_img_url'] = $cover_img_info['image_url'];
                } else {
                    return redirect()->back()->withInput()->withErrors('封面图片上传失败');
                }
            }
            DB::beginTransaction();
            $img_content_res = ImgContent::create($info);
            if ($img_content_res) {
                //添加正文图片
                $all_images = $request->get('all_images');
                $all_images_arr = explode(';', $all_images);
                $data = [];
                foreach ($all_images_arr as $image) {
                    $data[] = [
                        'content_id' => $img_content_res['content_id'],
                        'img_url' => $image
                    ];
                }
                $res = ImgContentImg::insert($data);
                if ($res) {
                    DB::commit();
                    return redirect()->to('/admin/images/index');
                }
            }
            DB::rollBack();
            return redirect()->back('/admin/articles/index')->withInput()->withErrors('添加失败');
        }
        $img_content = ImgContent::find($content_id);
        $sub_images = ImgContentImg::where('content_id', $content_id)->get();
        $category = Category::orderBy('order', 'asc')->get();
        return view('admin.images.edit', [
            'img_content' => $img_content,
            'sub_images' => $sub_images,
            'category' => $category
        ]);
    }

    //上传
    public function upload(Request $request)
    {
        $result = Helper::upload($request);
        if ($result['status'] == 1) {
            return $result;
        }
        return response(json_encode($result), '500');
    }

    //删除
    public function delete(Request $request)
    {
        $id = (int)$request->get('content_id');
        if (ImgContent::destroy($id)) {
            ImgContentImg::where('content_id', $id)->delete();
            return redirect()->to('/admin/images/index');
        } else {
            return redirect()->back();
        }
    }

}