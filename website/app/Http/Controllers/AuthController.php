<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery\Expectation;

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
        try {
            logger()->info('Login Request Data:', $request->all());
            $request->validate([
                'cellphone' => ['required', 'regex:/^09[0-9][0-9]{8}$/'],
            ]);


            $user = User::where('cellphone', $request->cellphone)->first();
            $otpCode = mt_rand(1000, 9999);
            $loginToken = Hash::make('1234567890!@#$%^&*()_-+=qwertyuiop[]\';lkjhgfdsasazxcvbnm,./QWERTYUIOP{}ASDFGHJKL:"ZXCVN<>?');


            if ($user) {
                $user->update([
                    'otp' => $otpCode,
                    'login_token' => $loginToken,
                ]);
            } else {
                $user = User::create([
                    'cellphone' => $request->cellphone,
                    'otp' => $otpCode,
                    'login_token' => $loginToken,
                ]);
            };
            sendOtpSms($request->cellphone, $otpCode);

            return response()->json(['loginToken' => $loginToken], 200);
        } catch (\Exception $e) {
            \Log::error('Login Error', ['message' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function checkOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:4',
            'login_token' => 'required'
        ]);


        try {
            $user = User::where('login_token', $request->login_token)->firstOrFail();

            if ($user->otp == $request->otp) {
                auth()->login($user, $remember = true);

                return response()->json(['message' => 'ورود با موفقیت انجام شد'], 200);
            } else {
                return response()->json(['error' => 'کد ورد نادرست است'], 422);
            }
        } catch (\Exception $e) {
            \Log::error('Login Error', ['message' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function resendOtp(Request $request)
    {
        // dd($request->all());
        try {
            logger()->info('Login Request Data:', $request->all());
            $request->validate([
                'login_token' => ['required'],
            ]);


            $user = User::where('login_token', $request->login_token)->firstOrfail();
            $otpCode = mt_rand(1000, 9999);
            $loginToken = Hash::make('1234567890!@#$%^&*()_-+=qwertyuiop[]\';lkjhgfdsasazxcvbnm,./QWERTYUIOP{}ASDFGHJKL:"ZXCVN<>?');

            \Log::error('error login token', ['message' => $request->login_token]);
            $user->update([
                'otp' => $otpCode,
                'login_token' => $loginToken,
            ]);

            sendOtpSms($request->cellphone, $otpCode);

            return response()->json(['loginToken' => $loginToken], 200);
        } catch (\Exception $e) {
            \Log::error('Login Error', ['message' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
