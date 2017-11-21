<!DOCTYPE html>
<html lang="en">
<head>
    <title>harryseong | Places</title>
    @include('partials._head')
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.41.0/mapbox-gl.css' rel='stylesheet' />
</head>

<body>
@include('partials._nav')

<div id="map"></div>
<div id="mapWall"></div>

<div class="container col-md-12">
    @foreach($places as $place)
        <div class="placeBox" id="{{ $place->id }}">
            <strong><i class="fa fa-plane" aria-hidden="true"></i> {{ $place->display_name }}</strong>
        </div>
    @endforeach

    @if ( Auth::check())
        <div class="newPlaceButton"><strong><i class="fa fa-plus-circle" aria-hidden="true"></i> New Place</strong></div>
    @endif

        <div class="placeInfoHead">
            <h2><i class="fa fa-globe" aria-hidden="true"></i> Places</h2>
        </div>
        <div class="placeInfoBody">
            <p>Welcome to Places! Feel free to fly to the major cities listed here.</p>
        </div>

        <div class="footer">harryseong.com</div>
</div>

@include('partials._javascript')

</body>

<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.41.0/mapbox-gl.js'></script>

<script>
    $(".navbar").addClass("bg-light").removeClass("navbar-dark").addClass("navbar-light");
    $(".navbar-login").removeClass("navbar-login-dark").addClass("navbar-login-light");
    $(".footer").addClass("footer-dark")
</script>

<script>
    var seoul = new mapboxgl.LngLat(127.02, 37.53);

    // Instantiate MapBox
    mapboxgl.accessToken = 'pk.eyJ1IjoiaGFycnlzZW9uZyIsImEiOiJjaXQ4MW1uZzQwY3NhMm9wMWJmcDJkOTF0In0.0IESu9tlOZ2UCOO8Xqbl-g';
    var map = new mapboxgl.Map({
        container: 'map',
        center: seoul,
        style: 'mapbox://styles/mapbox/dark-v9',
        zoom: 10
    });

    // Variable for detecting flying status
    var flying = false;

    // Initialize variable for identifying previous placeBox
    var previousId = 0;

    $('.placeBox').click(function(e) {
        var currentId = event.target.id;
        var currentPlaceBox = $('#'+currentId);

        // Reset previous placeBox
        if(previousId!==0){
            var previousPlaceBox = $('#'+previousId);
            previousPlaceBox.removeClass('selected-placeBox');
            var p = previousPlaceBox.clone().find("fa-map-marker").remove().end().html();
            p = p.replace('fa-map-marker', 'fa-plane');
            previousPlaceBox.html(p);
        }

        // Selected placeBox altered
        currentPlaceBox.addClass('selected-placeBox');
        var c = currentPlaceBox.clone().find("fa-plane").remove().end().html();
        c = c.replace('fa-plane', 'fa-map-marker');
        currentPlaceBox.html(c);

        // Fire off Ajax request for selected city information
        e.preventDefault();
        $.ajax({
            url: 'place/{id}',
            type: 'GET',
            data: { id: currentId },
            success: function(response)
            {
                // Fly to selected city
                map.flyTo({center: response[4], zoom: 10});
                map.fire('flystart');

                $('.placeInfoHead').html('<h2><i class="fa fa-globe" aria-hidden="true"></i> '+response[0]+'</h2>');

                if(response[3]){
                    $('.placeInfoBody').html(
                        '<img src="images/'+response[2]+'" align="middle" width="300">' +
                        '<hr>' +
                        '<div class="row">' +
                        '<div class="col-md-6">' +
                        '<i class="fa fa-flag" aria-hidden="true"></i> '+response[1] +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<i class="fa fa-map-marker" aria-hidden="true"></i> '+response[4].join(', ') +
                        '</div>' +
                        '</div>' +
                        '<hr>' +
                        '<div class="row">' +
                        '<div class="col-md-6">' +
                        '<i class="fa fa-home" aria-hidden="true"></i> Lived Here' +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<i class="fa fa-calendar" aria-hidden="true"></i> '+response[6] +
                        '</div>' +
                        '</div>' +
                        '<hr>' +
                        '<p>'+response[5]+'</p>');
                }
                else if(response[3]===0){
                    $('.placeInfoBody').html(
                        '<img src="images/'+response[2]+'" align="middle" width="300">' +
                        '<hr>' +
                        '<div class="row">' +
                        '<div class="col-md-6">' +
                        '<i class="fa fa-flag" aria-hidden="true"></i> '+response[1] +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<i class="fa fa-map-marker" aria-hidden="true"></i> '+response[4].join(', ') +
                        '</div>' +
                        '</div>' +
                        '<hr>' +
                        '<div class="row">' +
                        '<div class="col-md-6">' +
                        '<i class="fa fa-suitcase" aria-hidden="true"></i> Visited Here' +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<i class="fa fa-calendar" aria-hidden="true"></i> '+response[6] +
                        '</div>' +
                        '</div>' +
                        '<hr>' +
                        '<p>'+response[5]+'</p>');
                }


                // Update placeInfo box contents
                map.on('moveend', function(){
                    if(flying) {
                        map.fire('flyend');
                    }
                });
            }
        });

        // Update previousId for next flight
        previousId = currentId;
    });

    map.on('flystart', function(){
        flying = true;
        $('.placeStatus').removeClass('hide-down').addClass('show-down');
//        $('.placeInfoHead').removeClass('show-right').addClass('hide-right');
//        $('.placeInfoBody').removeClass('show-right').addClass('hide-right');
    });
    map.on('flyend', function(){
        flying = false;
        $('.placeStatus').removeClass('show-down').addClass('hide-down');
//        $('.placeInfoHead').removeClass('hide-right').addClass('show-right');
//        $('.placeInfoBody').removeClass('hide-right').addClass('show-right');
    });

    $('.newPlaceButton').click(function(){
        window.location.href = "places/create";
    })
</script>

</html>
