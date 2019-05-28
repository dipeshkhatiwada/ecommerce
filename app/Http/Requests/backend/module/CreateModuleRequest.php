<?php

namespace App\Http\Requests\backend\module;

use Illuminate\Foundation\Http\FormRequest;

class CreateModuleRequest extends FormRequest
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
            'name' => 'required|unique:modules,name',
            'route' => 'required|unique:modules,route',
            'rank'=>'required|integer',

        ];
    }

    function messages()
    {
        return [
            'required' => 'Please Enter :attribute .',
            'unique' => ':attribute must be unique .',
        ];
    }
}
