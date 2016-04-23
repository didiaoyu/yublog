@extends("default.layouts.main")

@section("contents")
    <!-- Jumbotron -->
    <header class="jumbotron costomheader">
        <h1><span class="text-hide">Yu'Blog<span><img class="logo" src="/assets/frontend/images/logo.png"></span></span></h1>
        <p class="lead">不积跬步无以至千里 &nbsp;每天学习一点点 每天进步一点点</p>
    </header>
    <section class="container content">
        <div class="columns col-md-12">
            <div class="column two-thirds col-md-8">
                <ol class="repo-list">
                    @foreach($articles as $article)
                    <li class="repo-list-item">
                        <h3 class="repo-list-name">
                            <a href="{{ url('/detail/' . $article->id) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="repo-list-description">
                            {{ $article->description or '' }}
                        </p>
                        <p class="repo-list-meta">
                            <span class="glyphicon glyphicon-calendar"></span> {{ $article->published_at }}
                        </p>
                    </li>
                    @endforeach
                </ol>
            </div>
            <div class="column sidebar one-third col-md-4">
                <div class="widget">
                    <h4 class="title">标签云</h4>
                    <div class="content tag-cloud">
                        @foreach($tags as $tag)
                        <a href="{{ url('/tag/' . $tag['id']) }}">{{ $tag['name'] }}</a>
                        @endforeach
                        {{--<a href="/tag-cloud/">...</a>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <nav>
                {{--渲染分页样式--}}
                {{ $articles->render() }}
            </nav>

        </div>
        <!-- /pagination -->
    </section>
@stop
