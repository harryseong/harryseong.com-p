@extends('main')

@section('title', '| Blog')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-comment-o" aria-hidden="true"></i> Blog</h1>
        </div>
    </div>

    @foreach($posts as $post)
    <div class="row spacing-top-30">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>{{ $post->title }}</h4>
                    <p class="card-subtitle mb-2 text-muted">Published {{ date('F j, Y', strtotime($post->created_at)) }} | <span class="badge badge-secondary">{{ $post->category->name }}</span></p>
                    <p class="card-text">{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</p>

                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
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
