<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //

    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.index', compact('sliders'));
    }


    public function create()
    {
        return view('sliders.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:100|min:5|string',
            'link_title' => 'required|string',
            'link_address' => 'required|string',
            'body' => 'required|min:50|max:255|string',
        ]);


        $data = Slider::create([
            'title' => $request->title,
            'body' => $request->body,
            'link_title' => $request->link_title,
            'link_address' => $request->link_address
        ]);

        return redirect()->route('slider.index')->with('success', 'اسلایدر با موفقیت ایجاد شد');
    }


    public function edit(Slider $slider)
    {
        return view('sliders.edit', compact('slider'));
    }


    public function update(Slider $slider, Request $request)
    {

        $request->validate([
            'title' => 'required|max:100|min:5|string',
            'link_title' => 'required|string',
            'link_address' => 'required|string',
            'body' => 'required|min:50|max:255|string',
        ]);



        $slider->update([
            'title' => $request->title,
            'body' => $request->body,
            'link_title' => $request->link_title,
            'link_address' => $request->link_address
        ]);


        return redirect()->route('slider.index')->with('success', 'اسلایدر با موفقیت ویرایش شد');

    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('slider.index')->with('warning', 'اسلایدر با موفقیت حذف شد');



    }
}
