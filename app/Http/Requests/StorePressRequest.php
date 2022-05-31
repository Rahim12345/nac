<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePressRequest extends FormRequest
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
            'src'=>'nullable|image|max:2048',
            'src_mobile'=>'nullable|image|max:2048',
            'title_1_az'=>'nullable|max:255',
            'title_1_en'=>'nullable|max:255',
            'text_az'=>'nullable|max:10000',
            'text_en'=>'nullable|max:10000',
            'button_az'=>'nullable|max:255',
            'button_en'=>'nullable|max:255',
            'link'=>'nullable|url|max:255'
        ];
    }

    public function attributes()
    {
        return [
            'src'=>'Photo(destkop)',
            'src_mobile'=>'Photo(mobile)',
            'title_1_az'=>'Title(AZ)',
            'title_1_en'=>'Title(EN)',
            'text_az'=>'Text(AZ)',
            'text_en'=>'Text(EN)',
            'button_az'=>'Button(AZ)',
            'button_en'=>'Button(EN)',
            'link'=>'Link',
        ];
    }
}
