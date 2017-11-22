@extends('main')

@section('title', '| Reset Password')

@section('content')

    <div class="row justify-content-md-center">
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h1><i class="fa fa-refresh" aria-hidden="true"></i> Reset Password</h1>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>A link to reset your password will be emailed to you.</p>

                    {!! Form::open(['url' => 'password/email']) !!}

                    <div class="form-group row">
                        <div class="col-md-12">
                    {{ Form::email('email', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Email Address']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 d-flex justify-content-end">
                        {{ Form::submit('Reset Password', ['class' => 'btn btn-primary']) }}
                        </div>
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