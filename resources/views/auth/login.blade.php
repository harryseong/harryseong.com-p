@extends('main')

@section('title', '| Login')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    @include('partials._messages')
                    <h1><i class="fa fa-sign-in" aria-hidden="true"></i> Login</h1>

                    {!! Form::open() !!}
                    <div class="form-group row spacing-top-30">
                        <div class="col-md-12">
                            {{ Form::email('email', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Email Address']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            {{ Form::password('password', ['class' => 'form-control form-control-lg', 'placeholder' => 'Password']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <a href="{{ url('password/reset') }}">Forgot Password</a>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-end">

                    </div>
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