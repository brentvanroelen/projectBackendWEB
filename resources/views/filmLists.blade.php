
@extends('layouts.mainLayout')

@section('title', 'Your film lists')

@section('menu')
    @include('components.menu')
@endsection

@section('content')
<div class="container">
    <h1>Your Film Lists</h1>
    <input type="text" id="search" placeholder="Search films..." onkeyup="searchFilms()">
    
    @foreach($filmLists as $filmList)
        <h2>{{ str_replace('_', ' ', $filmList->title) }}</h2>
        <div class="scrollable-list">
            <ul id="filmList-{{ $filmList->id }}">
                @foreach($filmList->items as $item)
                    <li>
                        <img src="https://image.tmdb.org/t/p/w200{{ $item->film_poster }}" alt="{{ $item->film_title }}">
                        {{ $item->film_title }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
@endsection

@section('footer')
    <p>This is the footer</p>
@endsection

<script>
function searchFilms() {
    var input, filter, ul, li, i, txtValue;
    input = document.getElementById('search');
    filter = input.value.toUpperCase();
    ul = document.querySelectorAll('ul[id^="filmList-"]');
    ul.forEach(function(list) {
        li = list.getElementsByTagName('li');
        for (i = 0; i < li.length; i++) {
            txtValue = li[i].textContent || li[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    });
}
</script>