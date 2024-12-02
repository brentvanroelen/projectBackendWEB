<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class FaqQuestionController extends Controller
{
    public function index()
    {
        $questions = FaqQuestion::with('category')->get();
        return view('faq.admin.manageQuestions', compact('questions'));
    }

    public function create()
    {
        $categories = FaqCategory::all();
        return view('faq.admin.create_question', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        FaqQuestion::create($request->only('faq_category_id', 'question', 'answer'));

        return redirect()->route('admin.faq-questions.index')->with('status', 'Question created successfully.');
    }

    public function edit(FaqQuestion $question)
    {
        $categories = FaqCategory::all();
        return view('faq.admin.edit_question', compact('question', 'categories'));
    }

    public function update(Request $request, FaqQuestion $question)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $question->update($request->only('faq_category_id', 'question', 'answer'));

        return redirect()->route('admin.faq-questions.index')->with('status', 'Question updated successfully.');
    }

    public function destroy(FaqQuestion $question)
    {
        $question->delete();
        return redirect()->route('admin.faq-questions.index')->with('status', 'Question deleted successfully.');
    }
}