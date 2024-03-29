@extends('main')

@section('title', '| About')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-info-circle" aria-hidden="true"></i> About...</h1>
        </div>
    </div>

    <hr>

    <div id="about-accordion" data-children=".item">
        <div class="item">
            <a class="about-header" data-toggle="collapse" data-parent="#about-accordion" href="#about-section-1" aria-expanded="true" aria-controls="about-section-1">
                <i class="fa fa-code" aria-hidden="true"></i> This Website
            </a>
            <div id="about-section-1" class="collapse" role="tabpanel">
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
            </div>
        </div>

        <hr>

        <div class="item">
            <a class="about-header" data-toggle="collapse" data-parent="#about-accordion" href="#about-section-2" aria-expanded="false" aria-controls="about-section-2">
                <i class="fa fa-id-card-o" aria-hidden="true"></i> Harry Hyunsoo Seong
            </a>
            <div id="about-section-2" class="collapse" role="tabpanel">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
                        <img src="images/About.jpg" class="about-me-image image img-thumbnail">

                        <p>I graduated with a Biology degree from Northwestern University, but shortly thereafter found my true passion in computer science.
                            My foray into professional-level development began with full-stack Java/Spring Boot development projects at Northwestern University.
                            I have since picked up a few projects both inside and outside work while trying out different languages and frameworks. My desire is to stay
                            forever-curious and grow constantly as a human being. I just want to explore, learn, try, and repeat. The prospect of exploring realms unfamiliar to me always brings about
                            much excitement.</p>
                        <p><strong>Currently... </strong>freelancing, building a Angular web application, learning React.</p>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                        <h3><i class="fa fa-quote-left fa-pull-left" aria-hidden="true"></i> I just want to explore, learn, try, and repeat.
                            <i class="fa fa-quote-right" aria-hidden="true"></i></h3>
                        <br>
                        <strong><i class="fa fa-star-o" aria-hidden="true"></i> Hometown:</strong> Seoul, South Korea<br>
                        <strong><i class="fa fa-flag-o" aria-hidden="true"></i> Nationality:</strong> United States<br>
                        <strong><i class="fa fa-language" aria-hidden="true"></i> Languages:</strong> English, Korean<br>
                        <strong><i class="fa fa-birthday-cake" aria-hidden="true"></i> Birthday:</strong> August 1st, 1991<br>
                        <strong><i class="fa fa-home" aria-hidden="true"></i> Current Residence:</strong> Evanston, Illinois<br>
                        <strong><i class="fa fa-futbol-o" aria-hidden="true"></i> Hobbies:</strong> Coding, Acoustic Guitar, Bass Guitar, Piano, Biking, Cooking, Reading, Travelling
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row social-media-row justify-content-md-center justify-content-sm-center justify-content-center">
        <div class="col-lg-2 col-md-3 col-sm-3 col-3" align="center"><a href="https://github.com/harryseong" class="social-media-icon"><i class="fa fa-github fa-4x" aria-hidden="true"></i></a></div>
        <div class="col-lg-2 col-md-3 col-sm-3 col-3" align="center"><a href="https://www.linkedin.com/in/harry-seong-78957777" class="social-media-icon"><i class="fa fa-linkedin fa-4x" aria-hidden="true"></i></a></div>
        <div class="col-lg-2 col-md-3 col-sm-3 col-3" align="center"><a href="https://www.facebook.com/harryhseong" class="social-media-icon"><i class="fa fa-facebook fa-4x" aria-hidden="true"></i></a></div>
    </div>

@stop

@section('scripts')
    <script>
        $("body").addClass("body-red");
        $(".navbar").removeClass("navbar-dark").addClass("navbar-light").addClass("navbar-transparent");
        $(".navbar-login").removeClass("navbar-login-dark").addClass("navbar-login-light");
        $(".about-header").addClass("collapsed");
    </script>
@stop