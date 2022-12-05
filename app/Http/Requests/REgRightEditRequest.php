<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class REgRightEditRequest extends FormRequest
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
            "startDate"=>['required','date'],
            "ExpireDate"=>['required','date','after_or_equal:startDate'],
            "financeNumber"=>['required','numeric'],
            "financetDate"=> ['required', 'date'],
            "billNumber"=>['required','numeric'],
            "reciptNumber"=>['required','numeric'],
            "recipttDate"=>['required','date'],
            "totalfee"=>['required','numeric'],
            "bank"=>['required','string'],
            'finacnceDocfile'=>['required','max:3000'],
            'finacnceReciptfile'=>['required','max:3000'],

        ];
    }

    public function messages()
    {
        return[
           'required'=>':attribute ضروری دی ',
            'numeric' => ':attribute باید اعداد وی',
            'after_or_equal' => ':attribute باید مساوی یا غټ له :date وی'

        ];
    }
    public function attributes()
    {
        return[
          'startDate'=>' ثبت نیټه',
          'ExpireDate'=>'د انقضاه نیټه',
          'financeNumber'=>'د مالی ریاست مکتوب ګڼه',
          'financetDate'=>'د مالی ریاست مکتوب نیټه',
          'billNumber'=>'آویز نمبر',
          'reciptNumber'=>'تعرفه نمبر',
          'recipttDate'=>'تعرفه نیټه',
          'totalfee'=>'مقدار',
          'bank'=>'بانک',
          'finacnceDocfile'=>'مکتوب فایل',
          'finacnceReciptfile'=>'تعرفه فایل',

        ];
    }
}
