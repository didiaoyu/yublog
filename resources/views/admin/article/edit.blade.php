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
                                <span class="widget-caption">文章添加</span>
                            </div>
                            <div class="widget-body">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" data-parsley-validate="" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label for="info_username" class="col-sm-2 control-label no-padding-right">文章标题</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="info[title]" value="{{ $title }}" class="form-control" required placeholder="请输入文章标题"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="info_username" class="col-sm-2 control-label no-padding-right">标签</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="tags" value="{{ $tags }}" class="form-control" id="info_username" placeholder="请输入标签,多个标签请用英文逗号（,）分开"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="info_email" class="col-sm-2 control-label no-padding-right">内容</label>
                                            <div class="col-sm-10">
                                                <!-- 加载编辑器的容器 -->
                                                <script id="container" name="info[content]" type="text/plain">{!! $content !!}</script>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">提交</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="info[id]" value="{{ $id }}" />
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

    <script type="text/javascript">
        //实例化编辑器
        var editor = UE.getEditor('container');

        //Jquery select2
        $("#tags").select2({
            placeholder: "Select a State",
            allowClear: true
        });
    </script>
    {{--<script src="/assets/admin/js/user/index.js"></script>--}}
@stop