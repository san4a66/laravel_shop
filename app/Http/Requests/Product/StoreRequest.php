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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'price' => 'required|between:0,9999.99',
            'count' => 'required|integer',
            'is_published' => 'nullable|integer',
            'category_id' => 'nullable|integer',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array',

        ];
    }
}
