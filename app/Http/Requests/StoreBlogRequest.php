<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'menu_id'=>'required|exists:menus,id',
            'src.*'=>'nullable|max:2048',
            'title_az'=>'nullable|max:255',
            'title_en'=>'nullable|max:255',
            'intro_text_az'=>'nullable|max:60000',
            'intro_text_en'=>'nullable|max:60000',
            'text_az'=>'nullable|max:60000',
            'text_en'=>'nullable|max:60000',
        ];
    }

    public function attributes()
    {
        return [
            'src'=>'Photo',
            'title_az'=>'Title(AZ)',
            'title_en'=>'Title(EN)',
            'intro_text_az'=>'Intro(AZ)',
            'intro_text_en'=>'Intro(EN)',
            'text_az'=>'Text(AZ)',
            'text_en'=>'Text(EN)',
        ];
    }
}
