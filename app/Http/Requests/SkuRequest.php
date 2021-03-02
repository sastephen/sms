<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkuRequest extends FormRequest
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
            'name' => 'required|unique:skus|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required. idiot!',
            'name.unique' => 'The name MUST BE UNIQUEEEEEEE..... idiot!'
        ];
    }
}
