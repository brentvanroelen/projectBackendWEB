@extends('layouts.admin')

@section('title', 'Manage FAQ Questions')

@section('content')
<div class="faq-admin-container">
    <h2>Manage FAQ Questions</h2>
    <a href="{{ route('admin.faq-questions.create') }}" class="btn btn-primary">Add Question</a>
    @foreach($questions as $question)
        <div class="faq-question">
            <h4>{{ $question->question }}</h4>
            <p>{{ $question->answer }}</p>
            <a href="{{ route('admin.faq-questions.edit', $question) }}" class="btn btn-secondary">Edit Question</a>
            <form action="{{ route('admin.faq-questions.destroy', $question) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Question</button>
            </form>
        </div>
    @endforeach
</div>
@endsection