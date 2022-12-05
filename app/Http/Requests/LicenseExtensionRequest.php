<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicenseExtensionRequest extends FormRequest
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
            "reciptNumber"=>['required','numeric'],
            "ExtensionDocDate"=> ['required', 'date'],
            "frequency"=>['required','exists:frequenceys,id'],
            "province"=>['required','exists:provences,id'],
            "ExtensionDate"=>['required','date'],
            'frequenceyEndDate'=>['required', 'date'],
           

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
          'reciptNumber'=>'د  تمدید مکتوب ګڼه',
          'ExtensionDocDate'=>'د تمدید مکتوب نیټه',
          'frequency'=>'فریکونسی',
          'ExtensionDate'=>'د تمدید موده',
          'frequenceyEndDate'=>'د فریکونسی جواز پای نیټه',
          'province'=>'ولایت',
        ];
    }
}
