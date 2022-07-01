<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'classID' => [

            ],
            'studentID' => [
                'required',
                'string',
            ],
            'password' => [
                'required',
                'min:6',
            ],
            'fullName' => [
                'required'
            ],
            'birthDate' => [
                'required',
                'date',
                'before:today',
            ],
            'avatar' => [
                'nullable',
                'file',
                'image',
            ],
            'address' => [
                'required',
            ],
            'phoneNumber' => [
                'required',
            ]
        ];
    }
}
