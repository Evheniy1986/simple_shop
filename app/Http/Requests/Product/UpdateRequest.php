<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'content' => 'required|string|min:3',
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5000',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5000',
            'price' => 'required|numeric',
            'count' => 'required|numeric|integer',
            'is_published' => 'nullable',
            'category_id' => 'nullable|numeric|integer',
            'brand_id' => 'nullable|numeric|exists:brands,id',
            'delete_images' => 'nullable|array'

        ];
    }
}
