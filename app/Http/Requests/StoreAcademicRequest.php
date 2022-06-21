<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAcademicRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

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
            'email' => [
                'required',
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
