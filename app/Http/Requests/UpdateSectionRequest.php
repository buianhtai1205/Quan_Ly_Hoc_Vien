<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionRequest extends FormRequest
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
            'sectionID' => [
                'required',
            ],
            'subjectID' => [
                'required'
            ],
            'teacherID' => [
                'nullable'
            ],
            'typeSection' => [
                'required'
            ],
            'shift' => [
                'nullable'
            ],
            'room' => [
                'nullable'
            ],
            'beginDate' => [
                'nullable'
            ],
            'numOfLesson' => [
                'required'
            ],
            'limit' => [
                'required'
            ]
        ];
    }
}
