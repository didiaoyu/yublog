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
                                <span class="widget-caption">用户添加</span>
                            </div>
                            <div class="widget-body">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" data-parsley-validate="" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label for="info_username" class="col-sm-2 control-label no-padding-right">用户名</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="info[name]" class="form-control" id="info_username" required placeholder="请输入用户名"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="info_email" class="col-sm-2 control-label no-padding-right">邮箱</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="info_email" name="info[email]" placeholder="请输入邮箱"
                                                       required data-parsley-type="email"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="info_password" class="col-sm-2 control-label no-padding-right">密码</label>
                                            <div class="col-sm-10">
                                                <input type="text" required class="form-control" name="info[password]" id="info_password" placeholder="请输入密码" />
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
    <link rel="stylesheet" href="/assets/vendor/js/parsleyjs/dist/parsley.css" />
    <script src="/assets/vendor/js/parsleyjs/dist/parsley.min.js"></script>
    <script src="/assets/vendor/js/parsleyjs/dist/i18n/zh_cn.js"></script>
    <script type="text/javascript">
    </script>
    {{--<script src="/assets/admin/js/user/index.js"></script>--}}
@stop