@extends('layouts.mainLayout')

@section('title', 'Edit Question')

@section('content')
<div class="faq-admin-container">
    <h2>Edit Question</h2>
    <form method="POST" action="{{ route('faq.questions.update', $question) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="faq_category_id">{{ __('Category') }}</label>
            <select id="faq_category_id" class="form-control" name="faq_category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $question->faq_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="question">{{ __('Question') }}</label>
            <input id="question" type="text" class="form-control" name="question" value="{{ $question->question }}" required>
        </div>
        <div class="form-group">
            <label for="answer">{{ __('Answer') }}</label>
            <textarea id="answer" class="form-control" name="answer" required>{{ $question->answer }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
        </div>
    </form>
</div>
@endsection