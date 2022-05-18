<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBrandRequest extends FormRequest
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
            'name' => 'required|unique:brands,name|min:3|max:255',
            'desc' => 'required|min:3|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập Thương Hiệu',
            'name.unique' => 'Thương Hiệu này đã tồn tại',
            'desc.required' => 'Bạn chưa nhập Mô Tả',
        ];
    }
}
