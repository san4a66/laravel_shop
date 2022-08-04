<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title'=>'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'price' => 'required|between:0,9999.99',
            'count' => 'required|integer',
            'category_id' => 'required|integer',
            'group_id' => 'required|integer',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array',
        ];
    }
}
