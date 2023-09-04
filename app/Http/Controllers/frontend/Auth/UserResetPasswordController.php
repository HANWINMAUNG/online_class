<?php
namespace App\Http\Controllers\frontend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendUserResetPasswordEmail;

class UserResetPasswordController extends Controller
{
    public function index(Request $request)
    {    
       if(!$request->hasValidSignature()){
            return redirect()
                     ->route('forgotPassword.index')
                     ->withErrors(['email' => 'Invalid reset password link']);
       }
       $user = User::find($request->user_id);
       if(is_null($user)){
         return redirect()
                   ->route('forgotPassword.index')
                   ->withErrors(['email' => 'Your email is cannot found']);
       }
       session(['reset_user_id' => $user->id]); 
       return view('frontend.Auth.reset_password');
    }
    public function reset(Request $request)
    {
        $attributes = $request->validate(['password' => 'required']);
        $user = User::findOrFail(session('reset_user_id'));
        $user->update(['password' => $attributes['password']]);
        session()->forget('reset_user_id');
        SendUserResetPasswordEmail::dispatch($user);
        return redirect()->route('get.login')->with('success', 'Your password is successfully reset!');
    }
}
