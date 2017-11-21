{{--Default Bootstrap Navbar--}}
<nav class="navbar navbar-expand-md navbar-dark navbar-transparent">
    <a class="navbar-brand" href="/">harryseong</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('places') ? "active" : "" }}">
                <a class="nav-link" href="/places">Places</a>
            </li>
            <li class="nav-item {{ Request::is('blog') ? "active" : "" }}">
                <a class="nav-link" href="/blog">Blog</a>
            </li>
            <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
                <a class="nav-link" href="/contact">Contact </a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">

            @if ( Auth::check())
                <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim( Auth::user()->email ))) . "?s=200&d=retro"}}" alt="gravatar" class="user-image rounded-circle">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
                    <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
                    <a class="dropdown-item" href="{{ route('places.create') }}">Places</a>
                    <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
                    <hr>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
                </div>
            </li>

            @else
            <a href="{{ route('login') }}" class="navbar-login navbar-login-dark"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
            @endif
        </ul>
    </div>
</nav>