@extends("default.layouts.main")

@section('seo_content')
    <title>{{ $title }}_{{ config('blog.name') }}_yublog.cc</title>
    <meta name="description" content="{{ $title }},{{ config('blog.description') }}">
    <meta name="keywords" content="{{ config('blog.keywords') }}">
    <meta name="author" content="{{ config('blog.name') }}">
@endsection

@section("contents")
<!-- Jumbotron -->
<header class="jumbotron">
    <p class="lead">{{ $title }}</p>
</header>

<main class="docs-wrapper container">
    <div class="row col-md-12">
        <article class=" markdown-body" id="docs-content">
            {!! $content !!}
        </article>
    </div>

</main>
@stop

@section("page_script")
    {{--<script src="/assets/vendor/ueditor/ueditor.parse.js"></script>--}}
    <script type="text/javascript">
        uParse('#docs-content', {
            rootPath: '/assets/vendor/ueditor/'
        })
    </script>
@stop