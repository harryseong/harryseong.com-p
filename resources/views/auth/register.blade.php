@extends('main')

@section('title', '| Register')

@section('content')

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            {!! Form::open() !!}

                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}

                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control']) }}

                {{ Form::label('password_confirmation', 'Confirm Password:') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                {{ Form::submit('Create Account', ['class' => 'btn btn-success btn-lg btn-block form-spacing-top']) }}

            {!! Form::close() !!}
        </div>
    </div>

@stop