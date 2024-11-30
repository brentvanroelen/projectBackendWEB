<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('questions')->get();
        return view('faq.index', compact('categories'));
    }

    public function create()
    {
        return view('faq.admin.create_category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FaqCategory::create($request->all());

        return redirect()->route('faq.categories.index')->with('status', 'Category created successfully.');
    }

    public function edit(FaqCategory $category)
    {
        return view('faq.admin.edit_category', compact('category'));
    }

    public function update(Request $request, FaqCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('faq.categories.index')->with('status', 'Category updated successfully.');
    }

    public function destroy(FaqCategory $category)
    {
        $category->delete();
        return redirect()->route('faq.categories.index')->with('status', 'Category deleted successfully.');
    }
}