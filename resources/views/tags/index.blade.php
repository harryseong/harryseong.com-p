@extends('main')

@section('title', '| Tags')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'tags.store']) !!}

                    <h2>New Tag</h2>
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}

                    {{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block form-spacing-top']) }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>

@stop