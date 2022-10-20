<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCompanyRequest extends FormRequest
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
            'companyName'=>'required',
            'compnayID'=>'required',
            'licenseNumber'=>'required',
            'company_type_id'=>'required',
            'company_active_type_id'=>'required',
            'companyManagerName'=>'required',
            'citizenship_id'=>'required',
            'freQuantity'=>'required',
            'agentName'=>'required',
            'fName'=>'required',
            'gFName'=>'required',
            'NIC'=>'required',
            'odistrict_id'=>'required',
            'cdistrict_id'=>'required',
            'cvillage'=>'required',
            'ovillage'=>'required',
            'phone'=>'required',

        ];
    }
}
