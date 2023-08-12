<?php

namespace App\Http\Controllers\frontend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendUserForgotPasswordEmail;


class UserForgotPasswordController extends Controller
{
     public function index()
    {
        return view('frontend.Auth.forgot_password');
    }
    public function sendEmail(Request $request)
    {
        $attributes = $request->validate(['email'=>'required|email']);

        $user = User::where('email',$attributes['email'])->first();
        
        if(is_null($user)){
            return back()->with(['email'=>'Your email cannot be found!']);
        }

        SendUserForgotPasswordEmail::dispatch($user);

        return back()->with('success','please check your email to reset password!');
    }
}
