<?php
namespace App\Http\Controllers\Frontend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Notifications\RegisterNotification;

class RegisterController extends Controller
{
    public function index()
    {
       return view('frontend.Auth.register');
    }

    public function postRegister(UserRequest $request)
    {
        $input = $request->validated();
        if($request->hasFile('profile') && $request->file('profile')->isValid()){
           $file_name = uploadFile($request->profile , 'images');
           $input['profile'] = $file_name;
        }
        $user = User::create($input);
       
         $user->notify(new RegisterNotification);

         $this->setResend($user);
         
         return redirect()->route('verification.sent');
    }
    
    private function setResend($user)
      {
        session(['resend'=>['id'=>$user->id]]);
      }
    
}
