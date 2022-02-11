<?php

namespace App\Http\Requests\Product;

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
            'product_name' => 'required|min:4',
            'product_price' => 'required|min:4|integer',
            'product_image' => 'required|mimes:jpg,png,jpeg|max:1109',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Vui lòng nhập ô này',
            'product_name.min' => 'Nhập ít nhất :min kí tự',
            'product_name.max' => 'Nhập nhiều nhất :max kí tự',
            'product_price.required' => 'Vui lòng nhập ô này',
            'product_price.min' => 'Nhập ít nhất :min chữ số',
            'product_price.integer' => 'Dữ liệu phải là số nguyên',
            'product_image.required' => 'Vui lòng nhập ô này',
            'product_image.mimes' => 'Hình ảnh phải có tên file đuôi là jpg, png, jpeg',
            'product_image.max' => 'Tên file không được quá :max kí tự',
        ];
    }
}
