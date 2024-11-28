<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Home</a>
        <br>
        <div class="navbar-links ml-auto">
            <a class="nav-link" href="{{ route('films.index') }}">Films</a>
            @guest
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                <a class="nav-link" href="{{ route('filmLists.index') }}">Film Lists</a>
                <a class="nav-link" href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a>
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</nav>