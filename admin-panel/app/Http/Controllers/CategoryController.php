<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }


    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'status' => 'required',
        ]);


        $data = Category::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('category.index')->with('success', 'ویژگی با موفقیت ایجاد شد');
    }


    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }


    public function update(Category $category, Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'status' => 'required',
        ]);


        $category->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);


        return redirect()->route('category.index')->with('success', 'ویژگی با موفقیت ویرایش شد');

    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('warning', 'ویژگی با موفقیت حذف شد');
    }
}
