<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //

    public function index()
    {
        $messages = ContactUs::all();

        return view('contacts.index',compact('messages'));
    }

    public function show(ContactUs $message)
    {
        return view('contacts.show', compact('message'));
    }


    public function destroy(ContactUs $message)
    {
        $message->delete();
        return redirect()->route('contact.index')->with('success', 'پیام با موفقیت حذف شد');
    }
}
