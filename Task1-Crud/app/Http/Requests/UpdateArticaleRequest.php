<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class UpdateArticaleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'title'=>'required|max:255',
            'description' =>'required|max:255',
            'image'=>'mimes:png,jpg,jpeg|max:1000',
            'category_id' =>'required|exists:categories,id'

        ];
    }


}
