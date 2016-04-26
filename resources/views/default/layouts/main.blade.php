<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('blog.name') }}</title>

    <meta name="description" content="{{ config('blog.description') }}">
    <meta name="keywords" content="{{ config('blog.keywords') }}">
    <meta name="author" content="{{ config('blog.name') }}">
    {{--<link rel="icon" href="favicon.ico">--}}

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/assets/frontend/css/responsive.css">
    <link rel="stylesheet" href="/assets/frontend/css/repo-list.css">
    <link rel="stylesheet" href="/assets/frontend/css/style.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/assets/vendor/js/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="/assets/vendor/js/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/assets/frontend/css/skin_1.css">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top site-navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Yu's Blog</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">首页</a>
                @foreach($category as $cate)
                    <li><a href="/category/{{ $cate['alias'] }}">{{ $cate['name'] }}</a>
                @endforeach
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

@yield('contents')

<!-- Site footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; {{ config('blog.name') }} 2016</p>
        {{--<p><a href="#" target="_blank">京ICP备xxxx号</a> | 京公网安备xxxxx</p>--}}
    </div>
</footer>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/assets/vendor/js/ie10-viewport-bug-workaround.js"></script>
<script src="/assets/vendor/js/jquery-2.0.3.min.js"></script>
<script src="/assets/vendor/js/bootstrap.min.js"></script>
{{--<script src="js/site.js"></script>--}}
@yield('page_script')
</body>

</html>