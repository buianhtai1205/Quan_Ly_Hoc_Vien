<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAcademicRequest extends FormRequest
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
            'fullName' => [
                'required',
                'string',
            ],
            'gender' => [
                'required',
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
            'password' => [
                'required',
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
