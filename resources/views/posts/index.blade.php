@extends('main')

@section('title', '| All Posts')

@section('content')

    <div class="row">
        <div class="col-md-9">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-3">
            <a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary">Create New Post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach ($posts as $post)

                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ substr($post->title, 0, 50) }}{{ strlen($post->title) > 50 ? "..." : "" }}</td>
                            <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
                            <td>{{ date('F nS, Y - g:ia', strtotime($post->created_at)) }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-light btn-sm">View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-light btn-sm">Edit</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

            <div class="row justify-content-md-center">
                {!! $posts -> links(); !!}
            </div>
        </div>
    </div>

@stop
