@extends('layouts.mainLayout')

@section('title', 'Manage FAQ')

@section('content')
<div class="faq-admin-container">
    <h2>Manage FAQ</h2>
    <a href="{{ route('faq.categories.create') }}" class="btn btn-primary">Add Category</a>
    <a href="{{ route('faq.questions.create') }}" class="btn btn-primary">Add Question</a>
    @foreach($categories as $category)
        <div class="faq-category">
            <h3>{{ $category->name }}</h3>
            <a href="{{ route('faq.categories.edit', $category) }}" class="btn btn-secondary">Edit Category</a>
            <form action="{{ route('faq.categories.destroy', $category) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Category</button>
            </form>
            @foreach($category->questions as $question)
                <div class="faq-question">
                    <h4>{{ $question->question }}</h4>
                    <p>{{ $question->answer }}</p>
                    <a href="{{ route('faq.questions.edit', $question) }}" class="btn btn-secondary">Edit Question</a>
                    <form action="{{ route('faq.questions.destroy', $question) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Question</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection