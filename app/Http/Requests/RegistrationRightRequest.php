<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRightRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "startDate"=>['required','date'],
            "financeNumber"=>['required','numeric'],
            "financetDate"=> ['required', 'date'],
            "billNumber"=>['required','numeric'],
            "reciptNumber"=>['required','numeric'],
            "recipttDate"=>['required','date'],
            "totalfee"=>['required','numeric'],
            "bank"=>['required','string'],
            'finacnceDocfile'=>['required', 'max:3000'],
            'finacnceReciptfile'=>['required', 'max:3000'],
            'ExpireDate'=>['required','date'],

        ];
    }

    public function messages()
    {
        return[
           'required'=>':attribute ضروری دی ',
            'numeric' => ':attribute باید اعداد وی',
        ];
    }
    public function attributes()
    {
        return[
            'startDate'=>'د ثبت نیټه',
          'financeNumber'=>'د مالی ریاست مکتوب ګڼه',
          'financetDate'=>'د مالی ریاست مکتوب نیټه',
          'billNumber'=>'آویز نمبر',
          'reciptNumber'=>'تعرفه نمبر',
          'recipttDate'=>'تعرفه نیټه',
          'totalfee'=>'مقدار',
          'bank'=>'بانک',
           'finacnceDocfile'=>'مکتوب فایل',
           'finacnceReciptfile'=>'تعرفه فایل',
           'ExpireDate'=>'تاریخ انقضاه',
        ];
    }
}
