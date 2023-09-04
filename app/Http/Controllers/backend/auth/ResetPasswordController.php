<?php
namespace App\Http\Controllers\backend\auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendResetPasswordEmail;

class ResetPasswordController extends Controller
{
    public function index(Request $request)
    {   
       if(!$request->hasValidSignature())
       {
            return redirect()
                     ->route('forgot-password.index')
                     ->withErrors(['email' => 'Invalid reset password link']);
       }
       $admin = Admin::find($request->admin_id);
       if(is_null($admin))
       {
         return redirect()
                   ->route('forgot-password.index')
                   ->withErrors(['email' => 'Your email is cannot found']);
       }
       session(['reset_admin_id' => $admin->id]); 
       return view('backend.auth.reset_password.index');
    }

    public function reset(Request $request)
    {
        $attributes = $request->validate(['password' =>'required']);
        $admin = Admin::findOrFail(session('reset_admin_id'));
        $admin->update(['password' => $attributes['password']]);
        session()->forget('reset_admin_id');
        SendResetPasswordEmail::dispatch($admin);
        return redirect()->route('admin_get.login')->with('success', 'Your password is successfully reset!');
    }
}
