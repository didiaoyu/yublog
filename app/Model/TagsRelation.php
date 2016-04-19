<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TagsRelation extends Model
{
    //表名称
    protected $table = 'tags_relations';

    /**
     * 可以批量赋值的字段
     * @var array
     */
    protected $fillable = [
        'article_id','tag_id'
    ];

    /**
     * 文章和标签的关系管理
     * @param int $articleId 文章ID
     * @param string $tags 标签
     * @param int $isDelete 是否删除文章原有的标签重新添加
     */
    public static function manageTagRelation($articleId, $tags, $isDelete=0)
    {
        if ($isDelete) {
            //删除文章原有的所有标签
            TagsRelation::where('article_id', $articleId)->delete();
        }
        //添加标签
        $tagArr = explode(',', str_replace('，', ',', $tags));
        foreach ($tagArr as $tagname) {
            $tagRes = Tag::firstOrCreate(['name' => $tagname]);
            TagsRelation::create(['article_id' => $articleId, 'tag_id' => $tagRes->id]);
        }
    }
}
