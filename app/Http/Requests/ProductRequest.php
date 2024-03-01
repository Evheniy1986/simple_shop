<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:3|max:255',
            'code' => 'required|min:3|max:255|unique:products,code,'. (isset($this->product) ? $this->product->id : ''),
            'description' => 'required|min:5',
            'category_id' => 'required',
            'price' => 'required|numeric|min:1',
        ];

        return $rules;
    }
}
