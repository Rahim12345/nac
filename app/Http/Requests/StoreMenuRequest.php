<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'menu_id'=>'required',
            'src'=>'nullable|max:2048',
            'menu_az'=>'nullable|max:255',
            'menu_en'=>'nullable|max:255',
            'title_az'=>'nullable|max:255',
            'title_en'=>'nullable|max:255',
            'button_az'=>'nullable|max:255',
            'button_en'=>'nullable|max:255',
            'link'=>'nullable|max:255',
            'text_az'=>'nullable|max:255',
            'text_en'=>'nullable|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'menu_id'=>'Parent',
            'src'=>'Banner',
            'menu_az'=>'Menu(AZ)',
            'menu_en'=>'Menu(EN)',
            'title_az'=>'Title(AZ)',
            'title_en'=>'Title(EN)',
            'button_az'=>'Button(AZ)',
            'button_en'=>'Button(EN)',
            'link'=>'Link',
            'text_az'=>'Text(AZ)',
            'text_en'=>'Text(EN)',
        ];
    }
}
