<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //

    public function index()
    {
        return view('sliders.index');
    }


    public function create()
    {
        return view('sliders.create');
    }

    public function store(Request $request)
    {

        // dd($request->all());

        // $request->validate([
        //     'title' => 'required|max:100|min:5|string',
        //     'link_title' => 'required|string',
        //     'link_address' => 'required|string',
        //     'body' => 'required|min:50|max:300|string',
        // ]);


        // $data = Slider::create([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'link_title' => $request->link_title,
        //     'link_address' => $request->link_address
        // ]);

        return redirect()->route('slider.index')->with('success', 'اسلایدر با موفقیت ایجاد شد');
    }
}
