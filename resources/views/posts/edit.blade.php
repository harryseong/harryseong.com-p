@extends('main')

@section('title', '| Edit Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>tinymce.init({
            selector:'textarea',
            plugins: 'link code',
            menubar: 'false'
        });
    </script>

@stop

@section('content')

    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'data-parsley-validate' => '', 'method' => 'PUT']) !!}
    <div class="row justify-content-md-center">
        <div class="col-md-8 form-group">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ['class' => 'form-control form-control-lg', 'required' => '', 'maxlength' => '255']) }}

            {{ Form::label('slug', 'Slug:', ['class' => 'spacing-top-30']) }}
            {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255']) }}

            {{ Form::label('category_id', 'Category:', ['class' => 'spacing-top-30']) }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control select2-single', 'required' => '', 'style' => 'width: 100%']) }}

            {{ Form::label('tags', 'Tags:', ['class' => 'spacing-top-30']) }}
            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multiple', 'multiple' => 'multiple', 'required' => '', 'style' => 'width: 100%']) }}

            {{ Form::label('body', 'Body:', ['class' => 'spacing-top-30']) }}
            {{ Form::textarea('body', null, ['class' => 'form-control', 'required' => '']) }}
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
                        <dd class="col-sm-8">{{ date('F j, Y g:ia', strtotime($post->created_at)) }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Last Updated:</dt>
                        <dd class="col-sm-8">{{ date('F j, Y g:ia', strtotime($post->updated_at)) }}</dd>
                    </dl>

                    <hr>

                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('posts.show', 'Cancel', [$post->id], ['class'=>'btn btn-danger btn-block']) !!}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {!! Form::close() !!}

@stop

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2-single').select2({
                width: 'resolve', // need to override the changed default
                placeholder: 'Select a category'
            });

            $('.select2-multiple').select2({
                width: 'resolve', // need to override the changed default
                placeholder: 'Select tag(s)',
                allowClear: true
            });
        });
    </script>

@stop
