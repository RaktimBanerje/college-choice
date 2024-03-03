<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'slug' => 'nullable|string',
            'name' => 'nullable|string',
            'title' => 'nullable|string',
            'mode' => 'nullable|string',
            'date' => 'nullable|date',
            'overview' => 'nullable|string',
            'process' => 'nullable|string',
            'question_papers' => 'nullable|array',
            'syllabus' => 'nullable|string',
            'preparation_tips' => 'nullable|string',
            'cutoff' => 'nullable|string',
            'news' => 'nullable|string',
            'colleges' => 'nullable|array',
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
