<?php

namespace App\Http\Controllers\frontend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailVerificationController extends Controller
{
    public function verify(Request $request)
    {
        if(!$request-> hasValidSignature()){
           return view('frontend.Auth.expired_verification');
        };// hadvalidsignature url က user ရဲ့ email ဟုတ် မဟုတ် စစ်တာ//temporarySignedRouteကရလာတဲ့ကောင်ကိုစစ်တာ
        $user = User::findOrFail($request->user_id);
        if($user->hasVerifiedEmail()){
            return redirect()->route('get.login');
        }

        $user->markEmailAsVerified();//uers table ကemail verify at ကို date ထည့်ပေးတာ

        return redirect()->route('verification.success');
    }
    public function notice()
    {
        return view('frontend.Auth.verification_notice');
    }
    public function resend()
    {
       $user =User::findOrFail(session('resend')['id']);
       $user->notify(new RegisterNotification());
    //    $user->sendEmailVerificationNotification();

       $this->destroyResend();
       return redirect()->route('verification.success');
    }
    public function sent()
    {
        return view('frontend.Auth.verification_sent');

    }
    public function success()
    {
        return view('frontend.Auth.verification_success'); 
    }
    private function destroyResend()
    {
        session ()->forget('resend');
    }
}
