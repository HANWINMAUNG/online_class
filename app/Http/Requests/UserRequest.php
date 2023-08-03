<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method() == 'PATCH'){
            return [
                'name' =>'required',
                'email' =>'required',
                 'phone' =>'required',
                 'password' =>'confirmed',
                 'address' =>'nullable',
                 'gender' =>'nullable',
                 'dob' =>'nullable',
                 'profile' =>'nullable',
            ];
        }else{
        return [
            'name' =>'required',
            'email' =>'required',
             'password'=>'required',
             'phone' =>'required',
            'address' =>'nullable',
             'gender' =>'nullable',
             'dob' =>'nullable',
             'profile' =>'nullable',
        ];
    }
}
}
