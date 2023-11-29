<?php

namespace App\Http\Controllers\frontend\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class UserLoginController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;
   
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
      
     public function socialiteSignIn(string $provider)
     {
        if(false == in_array($provider , ['github' , 'google'])){
            return back()->withErrors(['err' => 'Invalid provider to sign in!']);
        }
        return Socialite::driver($provider)->redirect();
     } 

     public function socialiteCallback(string $provider, Request $request)
     {
        if($request->error) {
             return redirect()->route('get.login')->withErrors(['err' => $request->error_description]);
         }

         if(false == in_array($provider , ['github' , 'google'])){
            return back()->withErrors(['error' => 'Invalid provider to sign in!']);
        }   
          
         $user = Socialite::driver($provider)->user();
         $user = User::firstOrCreate([
             'email' => $user->getEmail()
         ] , [
               'name' => $user->getName() ?? '',
               'password' => 123123123,
               'profile' => $user->getAvatar(), 
               'dob' => Carbon::now()->format('Y-m-d'),
               'email_verified_at' => Carbon::now()->format('Y-m-d H:m:i'),
         ]);
         Auth :: login($user);
         return redirect()->route('home');
     }
}


