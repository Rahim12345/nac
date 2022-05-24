<?php

namespace App\Http\Requests;

use App\Rules\TwoLangRequired;
use Illuminate\Foundation\Http\FormRequest;

class StoreOptionRequest extends FormRequest
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
            'unvan'=>['required','max:255', new TwoLangRequired()],
            'facebook'=>'required|max:255',
            'twitter'=>'required|max:255',
            'youtube'=>'required|max:255',
            'instagram'=>'required|max:255',
            'email'=>'required|max:255',
            'tel'=>'required|max:255',

        ];
    }

    public function attributes()
    {
        return [
            'unvan'=>'Address',
            'facebook'=>'Facebook',
            'twitter'=>'Twitter',
            'youtube'=>'YouTube',
            'instagram'=>'Instagram',
            'email'=>'Email',
            'tel'=>'Telefon',
        ];
    }
}


