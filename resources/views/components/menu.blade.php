
<nav class="navbar">
    <a href="{{ route('welcome') }}" class="navbar-logo">MyApp</a>
    <ul class="navbar-menu">
        <li><a href="{{ route('welcome') }}">Welcome</a></li>
        <li><a href="{{ route('profile') }}">Profile</a></li>
        <li><a href="{{ route('films.index') }}">Films</a></li>
        <li><a href="{{ route('filmLists.index') }}">Film Lists</a></li>
    </ul>
</nav>