<?php

namespace App\Http\Requests\Properties;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'title_en'      => 'required|min:3|max:50',
            'title_sr'      => 'required|min:3|max:50',
            'content_en'    => 'required|min:5',
            'content_sr'    => 'required|min:5',
            'image'         => 'max:2048|image:jpg,png',
            'gallery.*'     => 'image:jpg,png',
        ];
    }
}
