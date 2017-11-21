@extends('main')

@section('title', '| About')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-info-circle" aria-hidden="true"></i> About Me</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3">
            <img src="images/About.jpg" class="about-me-image image img-thumbnail">
        </div>
        <div class="col-lg-4 col-md-9 col-sm-9">
            <h3>Harry Hyunsoo Seong</h3>
            <strong><i class="fa fa-star-o" aria-hidden="true"></i> Hometown:</strong> Seoul, South Korea<br>
            <strong><i class="fa fa-flag-o" aria-hidden="true"></i> Nationality:</strong> United States<br>
            <strong><i class="fa fa-language" aria-hidden="true"></i> Languages:</strong> English, Korean<br>
            <strong><i class="fa fa-birthday-cake" aria-hidden="true"></i> Birthday:</strong> August 1st, 1991<br>
            <strong><i class="fa fa-home" aria-hidden="true"></i> Current Residence:</strong> Evanston, Illinois<br>
            <strong><i class="fa fa-futbol-o" aria-hidden="true"></i> Hobbies:</strong> Coding, Acoustic Guitar, Bass Guitar, Piano, Biking, Cooking, Reading, Travelling<br>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12">
            <h3><i class="fa fa-quote-left fa-pull-left" aria-hidden="true"></i> I just want to learn, apply, and repeat.
                <i class="fa fa-quote-right" aria-hidden="true"></i></h3>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-tasks" aria-hidden="true"></i> CV</h1>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $("body").addClass("body-red");
        $(".navbar").removeClass("navbar-dark").addClass("navbar-light").addClass("navbar-transparent");
        $(".navbar-login").removeClass("navbar-login-dark").addClass("navbar-login-light");
    </script>
@stop