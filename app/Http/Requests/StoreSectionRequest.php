<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
            'sectionID' => [
                'required',
                'unique:App\Models\Section',
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
