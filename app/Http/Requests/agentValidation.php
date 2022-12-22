<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class agentValidation extends FormRequest
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
            'agentName'=>'required',
            'fName'=>'required',
            'gFName'=>'required',
            'NIC'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'odistrict_id'=>'required',
            'ovillage'=>'required',
            'cdistrict_id'=>'required',
            'cvillage'=>'required',
            'photo'=>'required',
        ];
    }
}
