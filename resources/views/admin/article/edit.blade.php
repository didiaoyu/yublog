@extends("admin.layouts.main")

@section('page_css')
    <link href="/assets/vendor/css/dataTables.bootstrap.css" rel="stylesheet" />
@stop

@section("content")
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-header bordered-bottom bordered-blue">
                                <span class="widget-caption">文章修改</span>
                            </div>
                            <div class="widget-body">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" data-parsley-validate="" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">所属栏目</label>
                                            <div class="col-sm-10">
                                                <select name="info[cate_id]" required>
                                                    <option value="">--请选择--</option>
                                                    @foreach($category as $cate)
                                                        <option value="{{ $cate->id }}" {{ $articleInfo['cate_id'] == $cate->id ? 'selected' : '' }}>{{ $cate->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">文章标题</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="info[title]" value="{{ $articleInfo['title'] or '' }}" class="form-control" required placeholder="请输入文章标题"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">标签</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="tags" value="{{ $articleInfo['tags'] or '' }}" class="form-control" id="info_username" placeholder="请输入标签,多个标签请用英文逗号（,）分开"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">文章描述</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="info[description]" class="form-control">{{ $articleInfo['description'] or '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="info_email" class="col-sm-2 control-label no-padding-right">内容</label>
                                            <div class="col-sm-10">
                                                <!-- 加载编辑器的容器 -->
                                                <script id="container" name="info[content]" type="text/plain">{!! $articleInfo['content'] or '' !!}</script>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">是否发布</label>
                                            <div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="colored-success" name="info[is_published]" value="1"
                                                                {{ $articleInfo['is_published'] ? 'checked' : '' }}>
                                                        <span class="text">立即发布</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">发布时间</label>
                                            <div class="col-sm-10">
                                                <span class="input-icon icon-right">
                                                    <input class="form-control date-picker" type="text" name="info[published_at]"
                                                           value="{{ $articleInfo['published_at'] or '' }}"
                                                           data-date-format="yyyy-mm-dd hh:ii:ss"/>
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">提交</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="info[id]" value="{{ $articleInfo['id'] }}" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('page_script')
    {{--表单验证js--}}
    <link rel="stylesheet" href="/assets/vendor/js/parsleyjs/dist/parsley.css" />
    <script src="/assets/vendor/js/parsleyjs/dist/parsley.min.js"></script>
    <script src="/assets/vendor/js/parsleyjs/dist/i18n/zh_cn.js"></script>
    {{--Jquery Select2--}}
    <script src="/assets/vendor/js/select2/select2.js"></script>
    {{--百度编辑器--}}
    <!-- 配置文件 -->
    <script type="text/javascript" src="/assets/vendor/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/assets/vendor/ueditor/ueditor.all.js"></script>
    <!--Bootstrap Date Picker-->
    <link rel="stylesheet" href="/assets/vendor/js/datetime/css/custom-datetimepicker.css" />
    <script src="/assets/vendor/js/datetime/bootstrap-datetimepicker.js"></script>
    <script src="/assets/vendor/js/datetime/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>

    <script type="text/javascript">
        //实例化编辑器
        var editor = UE.getEditor('container');

        //--Bootstrap Date Picker--
        $('.date-picker').datetimepicker({
            autoclose: true,
            todayBtn: true,
            language: 'zh-CN'
        });
    </script>
    {{--<script src="/assets/admin/js/user/index.js"></script>--}}
@stop