@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')

    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <h1>{{ $post->title }}</h1>
            <p class="card-subtitle mb-2 text-muted">Published {{ date('F j, Y', strtotime($post->created_at)) }} | <span class="badge badge-secondary">{{ $post->category->name }}</span></p>
            <p class="spacing-top-30">{!! $post->body !!}</p>
            <hr class="spacing-top-30">
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h2 class="comments-title"><i class="fa fa-comment" aria-hidden="true"></i>{{ $post->comments()->count() }} Comments</h2>
            @foreach($post->comments as $comment)
                <div class="card comment-card">
                    <div class="card-body comment-card-body">
                        <div class="author-info">
                            <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=200&d=retro"}}" alt="gravatar" class="author-image rounded-circle">
                            <div class="author-name">
                                <h4>{{ $comment->name }}</h4>
                                <p class="author-time">{{ date('F nS, Y - g:ia', strtotime($comment->created_at)) }}</p>
                            </div>
                        </div>
                        <div class="comment-content">
                            {!! $comment->comment !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row justify-content-md-center spacing-top-30">
        <div id="comment-form" class="col-md-6">
            {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

            <div class="form-group row">
                <div class="col-md-6">
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'John Doe']) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'john.doe@gmail.com']) }}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    {{ Form::label('comment', 'Comment:') }}
                    {{ Form::textarea('comment', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    {{ Form::submit('Add Comment', ['class' => 'btn btn-block btn-primary']) }}
                </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>tinymce.init({
            selector:'textarea',
            plugins: 'link code',
            menubar: 'false'
        });
    </script>
    <script>
        $(".navbar").addClass("bg-dark").addClass("navbar-dark");
    </script>
@stop
