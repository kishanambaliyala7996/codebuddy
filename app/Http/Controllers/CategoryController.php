<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parentCategory')->latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $requestData = $request->except('_token');
        if (!isset($requestData['is_parent_category']) && empty($requestData['parent_id'])){
            return redirect()->back()->with('error', 'Please select at least one parent category.');
        }
        Category::create([
           'title' => $requestData['title'],
           'parent_id' => !isset($requestData['is_parent_category']) ? $requestData['parent_id'] : 0,
        ]);
        return redirect()->route('categories.index')->with('status', 'Category Created Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category): \Illuminate\Http\RedirectResponse
    {
        $requestData = $request->except('_token');
        $category->update([
            'title' => $requestData['title'],
            'parent_id' => !isset($requestData['is_parent_category']) ? $requestData['parent_id'] : 0,
        ]);
        return redirect()->route('categories.index')->with('status', 'Category Updated Successfully');
    }

    public function destroy(Category $category): \Illuminate\Http\RedirectResponse
    {
        $category->delete();
        Category::where('parent_id', $category->id)->delete();
        return redirect()->route('categories.index')->with('status', 'Category Deleted Successfully');
    }
}
