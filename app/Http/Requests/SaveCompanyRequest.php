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
            'license_type_id'=>'required',
            'company_type_id'=>'required',
            'company_active_type_id'=>'required',
            'companyManagerName'=>'required',
            'citizenship_id'=>'required',
            'licenseNumber'=>['required','array','min:1'],
            'licenseNumber.*'=>['required'],
            'issueDate'=>['required','array','min:1'],
            'issueDate.*'=>'required',
            'licenseFile'=>['required','array','min:1'],
            'licenseFile.*'=>'required',
        ];
    }
}
