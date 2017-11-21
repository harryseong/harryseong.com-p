@extends('main')

@section('title', '| Edit Tag')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Edit Tag</h1>

            {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'data-parsley-validate' => '', 'method' => 'PUT']) }}

                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

                {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block form-spacing-top']) }}

            {{ Form::close() }}

        </div>
    </div>

@stop