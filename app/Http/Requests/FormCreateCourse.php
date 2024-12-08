<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
class FormCreateCourse extends FormRequest
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
            'course-title' => 'required|string|max:50|min:3',
            'level'       => 'in:beginner,intermediate,professional,all',
            'course-url' =>  'required|string|regex:/^[^\s]+$/|max:255|unique:courses,url',
        ];
    }

    public function messages()
    {
        return [
            'course-title.required'        => __('The course-title field is required.'),
            'course-title.min'             => __('The course-title must be at least 3 characters.'),
            'course-title.max'             => __('The course-title must not be greater than 50 characters.'),
            'course-url.required'         => __('The course-url field is required.'),
            'course-url.url'              => __('The course-url must be a valid URL.'),
            'course-url.max'              => __('The course-url must not be greater than 255 characters.'),
            'course-url.regex'            => __('The course-url format is invalid.'),
            'course-url.unique'           => __('The course-url has already been taken.'),
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        toast(__('Data entry error'), 'error');
        throw new ValidationException($validator, redirect()->back()->withErrors($validator)->withInput());
    }


}
