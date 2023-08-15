<?php

namespace App\Http\Controllers\frontend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
   
    public function Login()
    {
        return view('frontend.Auth.login');
    }

   
    public function postLogin(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' =>'required|min:6|max:12',  
        ]);
        $remember = isset( $request->remember) &&  $request->remember == 'on' ? true : false;
        $user = User::where('email',$request->email)->first();
         
        if(is_null($user)){
            return redirect()
                          ->route('get.login')
                          ->with(['unverified' =>'Your credentials does not match our records']);
        }
        if(!$user->hasVerifiedEmail()){
            $this->setResend($user);

        return redirect()->route('get.login')
        ->with(['unverified' =>'Please verify your email to sign in']);

        }
        if(Auth::attempt($attributes, $remember )){
           
            return redirect()->route('verification.notice');
        }
        return back()->withErrors(['message' =>'Invalid Credentials']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('get.login');
    }
    private function setResend($user){
        session(['resend'=>['id'=>$user->id]]);
      }
    

    
}
