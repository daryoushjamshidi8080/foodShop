<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //

    public function index()
    {
        $about = AboutUs::first();
        return view('about.index', compact('about'));
    }


    public function edit(AboutUs $about)
    {
        return view('about.edit', compact('about'));
    }

    public function update(Request $request ,AboutUs $about)
    {
        $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'body' => 'required|string|min:10|max:255',
        ]);

        $about->update([
            'title' => $request->title,
            'body' => $request->body,
            'link' => $request->link,
        ]);

        return redirect()->route('about.index')->with('success', 'با وموفقیت درباره ما تغییر یافت');
    }
}
