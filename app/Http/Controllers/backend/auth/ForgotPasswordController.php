<?php

namespace App\Http\Controllers\backend\auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendForgotPasswordEmail;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('backend.auth.forgot_password.index');
    }
    public function sendEmail(Request $request)
    {
        $attributes = $request->validate(['email'=>'required|email']);

        $admin = Admin::where('email',$attributes['email'])->first();
        
        if(is_null($admin)){
            return back()->with(['email'=>'Your email cannot be found!']);
        }

        SendForgotPasswordEmail::dispatch($admin);

        return back()->with('success','please check your email to reset password!');
    }
}
