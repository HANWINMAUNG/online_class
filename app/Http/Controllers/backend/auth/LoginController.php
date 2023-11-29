<?php
namespace App\Http\Controllers\backend\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{

    // protected $redirectTo = RouteServiceProvider::ADMINPANEL;
    public function Login()
    {
        return view('backend.auth.login');
    }

    public function postLogin(Request $request)
    {  
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12', 
         ]);
         if(auth()->guard('admin')->attempt($attributes))
          {
            return redirect()->intended('/admin');
          }
        return back()->withErrors(['email' => 'These credential does not match our records.']);
     }
    
     public function Logout()
     {
      dd('here');
            Auth::guard('admin')->logout();
            return redirect()->route('admin');
     }   
}
