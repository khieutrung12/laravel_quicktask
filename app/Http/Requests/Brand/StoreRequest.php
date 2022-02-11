<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'brand_name' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'brand_name.required' => 'Vui lòng nhập ô này',
            'brand_name.min' => 'Nhập ít nhất 3 kí tự',
        ];
    }
}
