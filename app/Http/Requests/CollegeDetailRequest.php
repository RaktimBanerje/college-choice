<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Backpack\Pro\Uploads\Validation\ValidDropzone;

class CollegeDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'college_id' => "integer",
            'info' => 'nullable|string',
            'course' => 'nullable|string',
            'admission' => 'nullable|string',
            'faculty' => 'nullable|string',
            'faq' => 'nullable|string',
            'images' => ValidDropzone::field('nullable')->file('file|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'),
            'videos' => 'nullable|string',
            'brochure'  => 'file|mimes:pdf'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
