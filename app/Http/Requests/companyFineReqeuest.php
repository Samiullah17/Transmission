<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class companyFineReqeuest extends FormRequest
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
            "financeNumber"=>['required','numeric'],
            "financetDate"=> ['required', 'date'],
            "billNumber"=>['required','numeric'],
            "reciptNumber"=>['required','numeric'],
            "recipttDate"=>['required','date'],
            "totalFinefee"=>['required','numeric'],
            "bank"=>['required','string'],
            'finacncefile'=>['required', 'max:3000'],
            'finacnceReciptfile'=>['required', 'max:3000'],
            "frequency"=>['required','exists:frequenceys,id'],
            "province"=>['required','exists:provences,id'],
        ];
    }

    public function messages()
    {
        return[
           'required'=>':attribute ضروری دی ',
            'numeric' => ':attribute باید اعداد وی',
            'exists' => ':attribute درست نیست',  
        ];
    }
    public function attributes()
    {
        return[
            'startDate'=>'د ثبت نیټه',
          'financeNumber'=>'د مالی ریاست مکتوب ګڼه',
          'financetDate'=>'د مالی ریاست مکتوب نیټه',
          'province'=>'ولایت',
          'frequency'=>'فریکونسی',
          'billNumber'=>'آویز نمبر',
          'reciptNumber'=>'تعرفه نمبر',
          'recipttDate'=>'تعرفه نیټه',
          'totalFinefee'=>'مقدار',
          'bank'=>'بانک',
           'finacncefile'=>'مکتوب فایل',
           'finacnceReciptfile'=>'تعرفه فایل',

        ];
    }
}
