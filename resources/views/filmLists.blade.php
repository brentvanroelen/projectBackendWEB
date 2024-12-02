@extends('layouts.mainLayout')

@section('title', 'Film Lists')

@section('menu')
    @include('components.menu')
@endsection

@section('content')
<div class="container">
    <h2>Film Lists</h2>
    @foreach($filmLists as $filmList)
        <div class="film-list">
            <h3>{{ ucfirst($filmList->title) }} List</h3>
            <div class="film-grid">
                @foreach($filmList->items as $item)
                    <div class="film-card">
                        <img src="https://image.tmdb.org/t/p/w200{{ $item->film_poster }}" alt="{{ $item->film_title }}">
                        <h3>{{ $item->film_title }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection

<!-- <script>
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
</script> -->