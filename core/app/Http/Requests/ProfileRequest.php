<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            "name"       => ['bail', 'required', 'string'],
            "address"    => ['bail', 'required', 'string'],
            "gender"     => ['bail', 'required', 'string'],
            "dob"        => ['bail', 'required', 'date'],
            "experience" => ['bail', 'required', 'numeric'],
            "bio"        => ['bail', 'required', 'string'],
            "cv"         => ['bail', 'required', 'string'],
            "resume"     => ['bail', 'required', 'string'],
        ];
    }
}
