@extends('main')

@section('title', '| View Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>

            <p class="lead">{!! $post->body !!}</p>

            <hr>

            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="badge badge-secondary">{{ $tag->name }}</span>
                @endforeach
            </div>

            <div id="backend-comments" class="spacing-top-50">
                <h3>Comments <small>{{ $post->comments()->count() }} Total</small></h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th>Posted On</th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach($post->comments as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>{{ date('n/j/Y - g:ia', strtotime($comment->created_at)) }}</td>
                            <td class="comment-icons-column">
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                {{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE' ]) }}
                                    {{ Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger delete-comment']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">URL:</dt>
                        <dd class="col-sm-8"><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Category:</dt>
                        <dd class="col-sm-8">{{ $post->category->name }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Created At:</dt>
                        <dd class="col-sm-8">{{ date('F n, Y - g:ia', strtotime($post->created_at)) }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Last Updated:</dt>
                        <dd class="col-sm-8">{{ date('F n, Y - g:ia', strtotime($post->updated_at)) }}</dd>
                    </dl>

                    <hr>

                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE' ]) }}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                            {{ Form::close() }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {{ Html::linkRoute('posts.index', 'See All Posts', [], ['class' => 'btn btn-dark btn-block spacing-top-30']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop