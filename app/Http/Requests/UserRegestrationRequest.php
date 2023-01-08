<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UserRegestrationRequest extends FormRequest
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
            "name" => ['required', 'string', 'min:3'],
            "Fname" => ['required', 'string', 'min:3'],
            "GFname" => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            "NID" => ['required', 'alpha_dash'],
            "CID" => ['required','alpha_dash'],
            "mobile" => ['required','numeric'],
            "Base" => ['required', 'string', 'min:3'],
            "rutbaa" => ['required', 'exists:rutbaas,id'],
            "province" => ['required', 'exists:provences,id'],

        ];
    }
}
