<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
        return [
            'title'=>'required',
            'instructor_id' =>'required',
            'category' =>'required',
            'price' =>'required',
            'image'=>'nullable|mimes:png,jpg|max:1000',
            'cover_photo'=>'nullable|mimes:png,jpg|max:1000',
            'description' =>'nullable',
            'summary' =>'nullable',
        ];
    }
}
