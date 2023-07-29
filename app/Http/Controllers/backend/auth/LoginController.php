<?php

namespace App\Http\Controllers\backend\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login()
    {
        return view('backend.auth.login');
    }
    public function postLogin(Request $request)
    {
        
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' =>'required|min:6|max:12',
            
         ]);
         if(auth()->guard('admin')->attempt($attributes)){
            return redirect()->intended('/admin');
          }
        return back()->withErrors(['email'=> 'These credential does not match our records.']);
     }
    
     public function Logout(){
            Auth::guard('admin')->logout();
            return redirect('admin/login');
    }
    
}
