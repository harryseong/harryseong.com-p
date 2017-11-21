@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@stop

@section('content')

    <div class="row justify-content-lg-center">
        <div class="col-lg-8 col-md-8">
            <div class="h1">Create New Post</div>

            {{ Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) }}
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        {{ Form :: label('title', 'Title:') }}
                        {{ Form :: text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

                        {{ Form :: label('slug', 'Slug:', ['class' => 'spacing-top-30']) }}
                        {{ Form :: text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

                        {{ Form :: label('category_id', 'Category:', ['class' => 'spacing-top-30']) }}
                        <select name="category_id" class="form-control select2-single" style="width: 100%">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        {{ Form :: label('tags', 'Tags:', ['class' => 'spacing-top-30']) }}
                        <select name="tags[]" class="form-control select2-multiple" multiple="multiple" style="width: 100%">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>

                        {{ Form :: label('body', 'Post Body:', ['class' => 'spacing-top-30']) }}
                        {{ Form :: textarea('body', null, array('class' => 'form-control')) }}

                        {{ Form :: submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block spacing-top-30')) }}
                    </div>
                </div>
            {{ Form::close() }}

        </div>
    </div>

@stop

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>tinymce.init({
            selector:'textarea',
            plugins: 'link code',
            menubar: 'false'
        });
    </script>

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