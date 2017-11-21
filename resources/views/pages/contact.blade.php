@extends('main')

@section('title', '| Contact')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @include('partials._messages')
                    <h1><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact Me</h1>
                    <form action="{{ url('contact') }}" method="POST" class="spacing-top-30">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label d-flex justify-content-end">Name:</label>
                            <div class="col-md-9">
                                <input id="name" name="name" class="form-control" placeholder="Your name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label d-flex justify-content-end">Email:</label>
                            <div class="col-md-9">
                                <input id="email" name="email" class="form-control" placeholder="Your email address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subject" class="col-md-2 col-form-label d-flex justify-content-end">Subject:</label>
                            <div class="col-md-9">
                                <input id="subject" name="subject" class="form-control" placeholder="Subject">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-2 col-form-label d-flex justify-content-end">Message:</label>
                            <div class="col-md-9">
                                <textarea id="message" name="message" class="form-control" placeholder="Type your message here..." style="height:200px"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-11 d-flex justify-content-end">
                                <input type="submit" value="Send Message" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
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