@extends("admin.layouts.main")

@section('page_css')
    <link href="/assets/vendor/css/dataTables.bootstrap.css" rel="stylesheet" />
@stop

@section("content")
    <!-- Page Breadcrumb -->
    <div class="page-header page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="#">首页</a>
            </li>
            <li class="active">用户管理</li>
        </ul>
        <div class="header-buttons">
            <a class="sidebar-toggler" href="#">
                <i class="fa fa-arrows-h"></i>
            </a>
            <a class="refresh" id="refresh-toggler" href="">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
            <a class="fullscreen" id="fullscreen-toggler" href="#">
                <i class="glyphicon glyphicon-fullscreen"></i>
            </a>
        </div>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-yellow">
                        <span class="widget-caption">
                            {{--<a id="bat_add_site" href="{{ url('admin/user/add') }}" class="btn btn-default fa fa-plus">
                                添加用户
                            </a>--}}
                            用户列表
                        </span>
                        <div class="widget-buttons">
                            <a href="#" data-toggle="maximize">
                                <i class="fa fa-expand"></i>
                            </a>
                            <a href="#" data-toggle="collapse">
                                <i class="fa fa-minus"></i>
                            </a>
                            <a href="#" data-toggle="dispose">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="widget-body no-padding">
                        <table class="table table-bordered table-hover table-striped" id="searchable">
                            <thead class="bordered-darkorange">
                            {{--页头--}}
                            </thead>
                            <tbody>
                            {{--数据部分--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('page_script')
    <script src="/assets/vendor/js/datatable/jquery.dataTables.min.js"></script>
    {{--<script src="/assets/vendor/js/datatable/dataTables.tableTools.min.js"></script>--}}
    <script src="/assets/vendor/js/datatable/dataTables.bootstrap.min.js"></script>

    <script src="/assets/admin/js/user/index.js"></script>
@stop