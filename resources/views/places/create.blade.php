@extends('main')

@section('title', '| New Place')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@stop

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                @include('partials._messages')
                <div class="h1"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Place</div>

                {{ Form::open(array('route' => 'places.store', 'data-parsley-validate' => '', 'files' => true)) }}
                <div class="row">
                    <div class="col-md-6 spacing-top-30">
                        {{ Form::label('display_name', 'Display Name:') }}
                        {{ Form::text('display_name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}
                    </div>
                    <div class="col-md-6 spacing-top-30">
                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}
                    </div>
                    <div class="col-md-6 spacing-top-30">
                        {{ Form::label('latitude', 'Latitude:') }}
                        {{ Form::text('latitude', null, ['class' => 'form-control', 'required' => '', 'pattern' => '/^(-?[1-8]?\d(?:\.\d{1,18})?|90(?:\.0{1,18})?)$/']) }}
                    </div>
                    <div class="col-md-6 spacing-top-30">
                        {{ Form::label('longitude', 'Longitude:') }}
                        {{ Form::text('longitude', null, ['class' => 'form-control', 'required' => '', 'pattern' => '/^(-?(?:1[0-7]|[1-9])?\d(?:\.\d{1,18})?|180(?:\.0{1,18})?)$/']) }}
                    </div>
                    <div class="col-md-8 spacing-top-30">
                        {{ Form::label('date_range', 'Date Range:') }}
                        {{ Form::text('date_range', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-4 spacing-top-30">
                        {{ Form::label('home', 'Lived Here?:') }}
                        {{ Form::select('home', [1=>'Yes', 0=>'No'], null, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-12 spacing-top-30">
                        {{ Form::label('place_image', 'Upload Place Image (16:9 Ratio Recommended):') }}
                        {{ Form::file('place_image', ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-12 spacing-top-30">
                        {{ Form::label('description', 'Description:') }}
                        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-12">
                        {{ Form::submit('Save Place', ['class' => 'btn btn-success btn-lg btn-block spacing-top-30']) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}

    <script>tinymce.init({
            selector:'textarea',
            plugins: 'link code',
            menubar: 'false'
        });
    </script>
    <script>
        $("body").addClass("body-blue");
        $(".footer").removeClass("footer-light").addClass("footer-dark");
    </script>
@stop