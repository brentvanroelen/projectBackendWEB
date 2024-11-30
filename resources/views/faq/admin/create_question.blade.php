@extends('layouts.mainLayout')

@section('title', 'Create Question')

@section('content')
<div class="faq-admin-container">
    <h2>Create Question</h2>
    <form method="POST" action="{{ route('faq.questions.store') }}">
        @csrf
        <div class="form-group">
            <label for="faq_category_id">{{ __('Category') }}</label>
            <select id="faq_category_id" class="form-control" name="faq_category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="question">{{ __('Question') }}</label>
            <input id="question" type="text" class="form-control" name="question" required>
        </div>
        <div class="form-group">
            <label for="answer">{{ __('Answer') }}</label>
            <textarea id="answer" class="form-control" name="answer" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        </div>
    </form>
</div>
@endsection