<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterTeachingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'schoolYear' => 'required',
            'semester' => [
                'required',
                'max:3',
                'min:1',
            ],
        ];
    }
}
