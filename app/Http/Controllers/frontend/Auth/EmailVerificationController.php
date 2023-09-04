<?php
namespace App\Http\Controllers\frontend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\RegisterNotification;

class EmailVerificationController extends Controller
{
    public function verify(Request $request)
    {
        if(!$request-> hasValidSignature()){
           return view('frontend.Auth.expired_verification');
        };
        $user = User::findOrFail($request->user_id);
        if($user->hasVerifiedEmail()){
            return redirect()->route('get.login');
        }
        $user->markEmailAsVerified();

        $this->destroyResend();

        return redirect()->route('verification.success');
    }

    public function notice()
    {
        return view('frontend.Auth.verification_notice');
    }

    public function loginSent()
    {
        return view('frontend.Auth.verification_login_sent');
    }

    public function resend()
    {
       $user =User::findOrFail(session('resend')['id']);
       $user->notify(new RegisterNotification());
       return redirect()->route('verification.notice');
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
