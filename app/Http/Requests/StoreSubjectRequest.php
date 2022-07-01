<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
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
            "subjectID" => [
                'required',
                'string',
                'unique:App\Models\Subject',
            ],
            "subjectName" => [
                'string',
                'required',
            ],
            "numOfCredits" => [
                'required',
                'min:1',
                'max:10',
            ]
        ];
    }
}
