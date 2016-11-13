@extends("admin.layouts.main")

@section('page_css')
    <link rel="stylesheet" type="text/css" href="/assets/vendor/webuploader/webuploader.css">
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/images/style.css">
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
                                <span class="widget-caption">图片添加</span>
                            </div>
                            <div class="widget-body">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" data-parsley-validate="" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">所属分类</label>
                                            <div class="col-sm-10">
                                                <select name="info[cate_id]" required>
                                                    <option value="">--请选择--</option>
                                                    @foreach($category as $cate)
                                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">图片</label>
                                            <div class="col-sm-10">
                                                <div id="wrapper">
                                                    <div id="container">
                                                        <!--头部，相册选择和格式选择-->

                                                        <div id="uploader">
                                                            <div class="queueList">
                                                                <div id="dndArea" class="placeholder">
                                                                    <div id="filePicker"></div>
                                                                    <p>或将照片拖到这里，单次最多可选300张</p>
                                                                </div>
                                                            </div>
                                                            <div class="statusBar" style="display:none;">
                                                                <div class="progress">
                                                                    <span class="text">0%</span>
                                                                    <span class="percentage"></span>
                                                                </div><div class="info"></div>
                                                                <div class="btns">
                                                                    <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">发布时间</label>
                                            <div class="col-sm-10">
                                                <span class="input-icon icon-right">
                                                    <input class="form-control date-picker" type="text" name="info[published_at]"
                                                           value="{{ $published_at or date('Y-m-d H:i:s') }}"
                                                           data-date-format="yyyy-mm-dd hh:ii:ss" />
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">提交</button>
                                            </div>
                                        </div>
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
    <!--Bootstrap Date Picker-->
    <link rel="stylesheet" href="/assets/vendor/js/datetime/css/custom-datetimepicker.css" />
    <script src="/assets/vendor/js/datetime/bootstrap-datetimepicker.js"></script>
    <script src="/assets/vendor/js/datetime/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
    {{--百度uploader--}}
    <script src="/assets/vendor/webuploader/webuploader.min.js"></script>
    {{--初始化上传控件--}}
    <script src="/assets/admin/js/images/upload.js" charset="UTF-8"></script>

    <script type="text/javascript">
        //--Bootstrap Date Picker--
        $('.date-picker').datetimepicker({
            autoclose: true,
            todayBtn: true,
            language: 'zh-CN'
        });
    </script>
    {{--<script src="/assets/admin/js/user/index.js"></script>--}}
@stop