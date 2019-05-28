<?php

namespace App\Http\Requests\backend\product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'subcategory_id'=>'required',
            'name'=>'required',
            'slug'=>'required',
            'price'=>'required',
            'discount'=>'required',
            'quantity'=>'required',
            'tag_id'=>'required',
            'short_description'=>'required',
            // 'attribute_name[]|attribute_value[]'=>'required',
//            ''=>'required',

        ];
    }
    function messages()
    {
        return [
            'required' => 'Please Enter :attribute .',
            'unique' => ':attribute must be unique .',
            'category_id.required' => 'Please Select Category .',
            'subcategory_id.required' => 'Please Select Sub-Category .',
            'tag_id.required' => 'Please Select Tag .',
            'attribute_name[]|attribute_value[].required'=>'Please Enter Attribute Name and Value .'

        ];
    }
}
