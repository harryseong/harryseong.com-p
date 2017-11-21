@extends('main')

@section('title', '| Blog')

@section('content')

    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <h1><i class="fa fa-comment-o" aria-hidden="true"></i> Blog</h1>
        </div>
    </div>

    @foreach($posts as $post)
    <div class="row justify-content-md-center spacing-top-30">
        <div class="col-md-12">
            <h2>{{ $post->title }}</h2>
            <h6>Published {{ date('F j, Y', strtotime($post->created_at)) }}</h6>

            <p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? "..." : "" }}</p>

            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
            <hr>
        </div>
    </div>
    @endforeach

    <div class="row justify-content-md-center">
        {!! $posts -> links(); !!}
    </div>
@stop

@section('scripts')
    <script>
        $(".navbar").addClass("bg-dark").addClass("navbar-dark");
    </script>
@stop
