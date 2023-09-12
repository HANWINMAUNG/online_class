<?php

namespace App\Http\Controllers\frontend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;

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
            'password' => 'required|min:6|max:12',  
        ]);
        $remember = isset( $request->remember) &&  $request->remember == 'on' ? true : false;
        $user = User::where('email',$request->email)->first();
        if(is_null($user)){
            return redirect()
                          ->route('get.login')
                          ->with(['unverified' => 'Your credentials does not match our records']);
        }
        if(!$user->hasVerifiedEmail()){         
            return redirect()->route('loginSent.sent')
                                    ->with(['unverified' => 'Please verify your email to sign in']);
        }
        if(Auth::attempt($attributes, $remember )){
           
            return redirect()->route('home');
        }
        return back()->withErrors(['message' => 'Invalid Credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    private function setResend($user)
      {
        session(['resend'=>['id'=>$user->id]]);
      }  
      
     public function github()
     {
        return Socialite::driver('github')->redirect();
     } 

     public function githubCallback(Request $request)
     {
        if($request->error) {
            dd(here);
             return redirect()->route('get.login')->withErrors(['error' => $request->error_description]);
         }
          
         $user = Socialite::driver('github')->user();

         $user = User::firstOrCreate([
             'email' => $user->getEmail()
         ] , [
               'name' => $user->getName(),
               'password' => 123123123,
               'profile' => $user->getAvatar(), 
               'dob' => Carbon::now()->format('Y-m-d'),
         ]);
         Auth :: login($user);
         return redirect()->route('home');
     }
}


