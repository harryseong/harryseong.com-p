<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')

    <title>harryseong | welcome</title>

    {{ Html::style('css/welcome.css') }}
</head>

<body>

    @include('partials._nav')

    <video autoplay="autoplay" poster="images/typewriter.jpg" id="bgvid">
        <source src="videos/welcome.mp4" type="video/mp4"/>
    </video>

    <div class="container-fluid" id="typewriter">
        <div class="row" id="typewriter-text">
            <div class="col-md-12">
                <h1>Welcome</h1>
                <p>
                <p>The typewriter that you see here is my Remington Rand Deluxe Model 5, a model that was manufactured in the 1940's.</p>
                <p>My relationship with technology is a necessary one, though one which continues to exist with a faint whisper of the hackneyed hyphenated adjective, "love-hate."</p>
                <p>You are welcome to enter and peer about into the world of the man who sits on the proverbial fence regarding his relationship to the aforementioned necessity.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12"><a id="enter" href="{{ route('places.index') }}">Enter</a></div>
        </div>

        <button id="vid-btn"><i class="fa fa-pause" aria-hidden="true"></i></button>
    </div>

    <div class="footer footer-fixed footer-dark">harryseong.com</div>

<script>
    var video = document.getElementById("bgvid");
    var pauseButton = document.getElementById("vid-btn");

    function vidFade() {
        video.classList.add("stopfade");
    }

    video.addEventListener("ended", function() {
        video.pause();
        pauseButton.innerHTML = "<i class=\"fa fa-repeat\" aria-hidden=\"true\"></i>";
        // to capture IE10
        vidFade();
    });

    pauseButton.addEventListener("click", function() {
        video.classList.toggle("stopfade");
        if (video.paused) {
            video.play();
            pauseButton.innerHTML = "<i class=\"fa fa-pause\" aria-hidden=\"true\"></i>";
        } else {
            video.pause();
            pauseButton.innerHTML = "<i class=\"fa fa-play\" aria-hidden=\"true\"></i>";
        }
    })
</script>
@include('partials._javascript')

</body>
</html>

