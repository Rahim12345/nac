<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMembershipRequest extends FormRequest
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
            'title_az'=>'nullable|max:255',
            'title_en'=>'nullable|max:255',
            'text_az'=>'nullable|max:60000',
            'text_en'=>'nullable|max:60000',
        ];
    }

    public function attributes()
    {
        return [
            'title_az'=>'Title(AZ)',
            'title_en'=>'Title(EN)',
            'text_az'=>'Text(AZ)',
            'text_en'=>'Text(EN)',
        ];
    }
}
