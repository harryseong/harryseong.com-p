@extends('main')

@section('title', '| Reset My Password')

@section('content')

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1>Reset Password</h1>
                    {!! Form::open(['url' => 'password/reset']) !!}

                    {{ Form::hidden('token', $token) }}

                    {{ Form::label('email', 'Email Address:') }}
                    {{ Form::email('email', null, ['class' => 'form-control form-control-lg']) }}

                    {{ Form::label('password', 'New Password:') }}
                    {{ Form::password('password', ['class' => 'form-control form-control-lg']) }}

                    {{ Form::label('password_confirmation', 'Confirm Password:') }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control form-control-lg']) }}

                    {{ Form::submit('Reset Password', ['class' => 'btn btn-primary spacing-top-30']) }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $("body").addClass("body-gray");
        $(".footer").removeClass("footer-light").addClass("footer-dark");
    </script>
@stop