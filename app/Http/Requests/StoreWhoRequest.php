<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWhoRequest extends FormRequest
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
            'src'=>'nullable|max:2048',
            'title_1_az'=>'nullable|max:255',
            'title_1_en'=>'nullable|max:255',
            'text_az'=>'nullable|max:10000',
            'text_en'=>'nullable|max:10000'
        ];
    }

    public function attributes()
    {
        return [
            'src'=>'Video',
            'title_1_az'=>'Title(AZ)',
            'title_1_en'=>'Title(EN)',
            'text_az'=>'Text(AZ)',
            'text_en'=>'Text(EN)'
        ];
    }
}
