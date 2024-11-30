@extends('layouts.mainLayout')

@section('title', 'FAQ')

@section('content')
<div class="faq-container">
    <h2>Frequently Asked Questions</h2>
    @foreach($categories as $category)
        <div class="faq-category">
            <h3>{{ $category->name }}</h3>
            @foreach($category->questions as $question)
                <div class="faq-question">
                    <h4>{{ $question->question }}</h4>
                    <p>{{ $question->answer }}</p>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection