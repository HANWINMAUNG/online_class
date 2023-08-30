<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeRequest extends FormRequest
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
                'title'=>'required',
                'cover' =>'nullable|mimes:png,jpg',
                'image' =>'nullable|mimes:png,jpg',
                'video' =>'nullable',
                'summary' =>'nullable',];
            }else{
            return [
                'title'=>'required',
                'course_id' =>'required',
                'cover' =>'nullable|mimes:png,jpg',
                'image' =>'nullable|mimes:png,jpg',
                'video' =>'nullable',
                'summary' =>'nullable',
            ];
    }
}
}
