<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());

        logger()->info('Login Request Data:', $request->all());
        $request->validate([
            'cellphone' => ['required', 'regex:/^09[0-9][0-9]{8}$/'],
        ]);


        $user = User::where();
        return response()->json(['message' => 'Done']);
    }
}
