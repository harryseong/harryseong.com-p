@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')

    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
            <hr>
            <p>Posted In: {{ $post->category->name }}</p>
            <hr>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <h3 class="comments-title"><i class="fa fa-comment" aria-hidden="true"></i>{{ $post->comments()->count() }} Comments</h3>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=200&d=retro"}}" alt="gravatar" class="author-image rounded-circle">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>
                            <p class="author-time">{{ date('F nS, Y - g:ia', strtotime($comment->created_at)) }}</p>
                        </div>
                    </div>
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>

                    <hr>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row justify-content-md-center spacing-top-30">
        <div id="comment-form" class="col-md-10 ">
            {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

            <div class="row">
                <div class="col-md-4">
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-4">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-12">
                    {{ Form::label('comment', 'Comment:') }}
                    {{ Form::textarea('comment', null, ['class' => 'form-control']) }}

                    {{ Form::submit('Add Comment', ['class' => 'btn btn-block btn-primary spacing-top-30']) }}
                </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $(".navbar").addClass("bg-dark").addClass("navbar-dark");
    </script>
@stop
