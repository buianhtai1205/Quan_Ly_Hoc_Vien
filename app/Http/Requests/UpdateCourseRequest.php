<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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

    public function rules()
    {
        return [
            "courseID" => [
                'required',
                'string',
            ],
            "courseName" => [
                'string',
                'required',
            ],
            "beginYear" => [
                'required',
            ],
            "endYear" => [
                'required',
            ],
        ];
    }
}
