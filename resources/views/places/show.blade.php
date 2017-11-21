@extends('main')

@section('title', '| Maps')

@section('stylesheets')
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.41.0/mapbox-gl.css' rel='stylesheet' />
    {!! Html::style('css/places.css') !!}
@stop

@section('content')

@stop

<div id="map"></div>

<div class="content">
    <div class="infoBoxHead">
        <h1 id="cityName">{{ $place->name }}</h1>
    </div>
    <div class="infoBoxBody">
        <p id="cityYears">[{{ $place->date_range }}]</p>
        <p id="cityDescription">{!! $place->description !!}</p>
    </div>

    <input type="hidden" id="longitude" value="{{ $place->longitude }}">
    <input type="hidden" id="latitude" value="{{ $place->latitude }}">

</div>

@section('scripts')
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.41.0/mapbox-gl.js'></script>
    <script>
        /**
         * Created by harry on 2/21/17.
         */

        mapboxgl.accessToken = 'pk.eyJ1IjoiaGFycnlzZW9uZyIsImEiOiJjaXQ4MW1uZzQwY3NhMm9wMWJmcDJkOTF0In0.0IESu9tlOZ2UCOO8Xqbl-g';

        var longitude = parseFloat($("#longitude").val());
        var latitude = parseFloat($("#latitude").val());
        var place = new mapboxgl.LngLat(longitude, latitude);

        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/dark-v9',
            center: place,
            zoom: 10
        });

        var fly = document.getElementById("flyButtonText");

        flyButton.addEventListener('click', function () {
            if (fly.innerHTML == "FLY TO 1ST-6TH GRADE"){
                map.flyTo({center: collegeStation, zoom: 10});
                fly.innerHTML = "FLY TO 6TH-8TH GRADE";
                cityName.innerHTML = "College Station, TX";
                cityYears.innerHTML = "[1997-2002]";
                cityDescription.innerHTML = "This is where Harry went to elementary school.";
            }
            else if (fly.innerHTML == "FLY TO 6TH-8TH GRADE"){
                map.flyTo({center: westLafayette, zoom: 10});
                fly.innerHTML = "FLY TO 8TH-12TH GRADE";
                cityName.innerHTML = "West Lafayette, IN";
                cityYears.innerHTML = "[2002-2004]";
                cityDescription.innerHTML = "This is where Harry went to middle school.";
            }
            else if (fly.innerHTML == "FLY TO 8TH-12TH GRADE"){
                map.flyTo({center: edenPrairie, zoom: 10});
                fly.innerHTML = "FLY TO COLLEGE";
                cityName.innerHTML = "Eden Prairie, MN";
                cityYears.innerHTML = "[2004-2009]";
                cityDescription.innerHTML = "This is where Harry went to high school.";
            }
            else if (fly.innerHTML == "FLY TO COLLEGE"){
                map.flyTo({center: evanston, zoom: 10});
                fly.innerHTML = "FLY TO HOMETOWN";
                cityName.innerHTML = "Evanston, IL";
                cityYears.innerHTML = "[2009-2013]";
                cityDescription.innerHTML = "This is where Harry went to college.";
            }
            else if (fly.innerHTML == "FLY TO HOMETOWN"){
                map.flyTo({center: seoul, zoom: 10});
                fly.innerHTML = "FLY TO 1ST-6TH GRADE";
                cityName.innerHTML = "Seoul, South Korea";
                cityYears.innerHTML = "[1997-2002]";
                cityDescription.innerHTML = "This was where Harry was born.";
            }

            // Fly to a random location by offsetting the Chicago point
            // by up to 5 degrees.
            /*
            map.flyTo({
                center: [-87.63 + (Math.random() - 0.5) * 10,
                          41.89 + (Math.random() - 0.5) * 10]
            });
            */
        });
    </script>

@stop