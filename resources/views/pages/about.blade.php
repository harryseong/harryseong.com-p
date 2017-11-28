@extends('main')

@section('title', '| About')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-info-circle" aria-hidden="true"></i> About...</h1>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <h2><i class="fa fa-code" aria-hidden="true"></i> This Website</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <p>This website was built for the purpose of learning the Laravel PHP framework while testing out some creative and practical elements.
                Hidden administrative functionality allows me to perform CRUD operations on Places and Blog entries. Ajax calls are implemented
            to update the Place page's map and information box as different cities are selected.</p>
            <strong>Languages:</strong> HTML, CSS, JavaScript, PHP<br>
            <strong>Framework:</strong> Laravel<br>
            <strong>Libraries:</strong> jQuery, BootStrap 4, HTMLPurifier, TinyMCE WYSIWYG Editor, Mapbox, Parsley, Select2<br>
            <strong>Database:</strong> MySQL<br>
            <strong>Managed Cloud Hosting:</strong> Digital Ocean via Cloudways, Pulled from Git Repository<br>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Harry Hyunsoo Seong</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3">
            <img src="images/About.jpg" class="about-me-image image img-thumbnail">
        </div>
        <div class="col-lg-6 col-md-9 col-sm-9">
            <p>I graduated with a Biology degree from Northwestern University, but luckily found my true passion in computer science.
            My foray into professional-level development began with full-stack Java/Spring Boot development projects at Northwestern University.
            I have since picked up a few projects both inside and outside work while trying out different languages and frameworks. My desire is to stay
            forever-curious while trying, learning, and growing as much as I can. The prospect of exploring realms unfamiliar to me always brings about
            much excitement, because I know things that presently remain mysteries to me can become enriching knowledge to me in the future.</p>
            <strong><i class="fa fa-star-o" aria-hidden="true"></i> Hometown:</strong> Seoul, South Korea<br>
            <strong><i class="fa fa-flag-o" aria-hidden="true"></i> Nationality:</strong> United States<br>
            <strong><i class="fa fa-language" aria-hidden="true"></i> Languages:</strong> English, Korean<br>
            <strong><i class="fa fa-birthday-cake" aria-hidden="true"></i> Birthday:</strong> August 1st, 1991<br>
            <strong><i class="fa fa-home" aria-hidden="true"></i> Current Residence:</strong> Evanston, Illinois<br>
            <strong><i class="fa fa-futbol-o" aria-hidden="true"></i> Hobbies:</strong> Coding, Acoustic Guitar, Bass Guitar, Piano, Biking, Cooking, Reading, Travelling<br>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h3><i class="fa fa-quote-left fa-pull-left" aria-hidden="true"></i> I just want to explore, learn, try, and repeat.
                <i class="fa fa-quote-right" aria-hidden="true"></i></h3>
        </div>
    </div>

    <hr>

@stop

@section('scripts')
    <script>
        $("body").addClass("body-red");
        $(".navbar").removeClass("navbar-dark").addClass("navbar-light").addClass("navbar-transparent");
        $(".navbar-login").removeClass("navbar-login-dark").addClass("navbar-login-light");
    </script>
@stop