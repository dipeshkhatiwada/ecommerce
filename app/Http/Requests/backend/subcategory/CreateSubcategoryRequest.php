<?php

namespace App\Http\Requests\backend\subcategory;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubcategoryRequest extends FormRequest
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
            'category_id'=>'required',
            'name'=>'required|unique:subcategories,name',
            'slug'=>'required|unique:subcategories,slug',
            'rank'=>'required|integer',
            'file'=>'required',
        ];
    }
    function messages()
    {
        return [
            'required' => 'Please Enter :attribute .',
            'unique' => ':attribute must be unique .',

            'file.required'=>'Please Select Image',
        ];
    }
}
