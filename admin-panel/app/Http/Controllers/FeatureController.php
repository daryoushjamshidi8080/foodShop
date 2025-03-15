<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
    //
    public function index()
    {
        $features = Feature::all();
        return view('features.index', compact('features'));
    }


    public function create()
    {
        return view('features.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:100|min:5|string',
            'icon' => 'required|string',
            'body' => 'required|min:50|max:255|string',
        ]);


        $data = Feature::create([
            'title' => $request->title,
            'body' => $request->body,
            'icon' => $request->icon
        ]);

        return redirect()->route('features.index')->with('success', 'اسلایدر با موفقیت ایجاد شد');
    }


    public function edit(Feature $feature)
    {
        return view('features.edit', compact('feature'));
    }


    public function update(Feature $feature, Request $request)
    {

        $request->validate([
            'title' => 'required|max:100|min:5|string',
            'icon' => 'required|string',
            'body' => 'required|min:50|max:255|string',
        ]);


        $data = $feature->update([
            'title' => $request->title,
            'body' => $request->body,
            'icon' => $request->icon
        ]);


        return redirect()->route('feature.index')->with('success', 'ویژگی با موفقیت ویرایش شد');

    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('feature.index')->with('warning', 'اسلایدر با موفقیت حذف شد');
    }
}
