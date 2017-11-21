<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>

    <body>
        @include('partials._nav')

        <div class="container col-md-12">
            @yield('content')
            @include('partials._footer')
        </div>

        @include('partials._javascript')
    </body>
</html>