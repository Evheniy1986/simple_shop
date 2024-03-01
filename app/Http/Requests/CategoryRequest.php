<?php

namespace App\Http\Requests;

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'code' => 'required|min:3|max:255|unique:categories,code,' . (isset($this->category) ? $this->category->id : ''),
            'description' => 'required|min:5',
        ];

    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'min' => 'Поле :attribute должно иметь :min символов'
        ];
    }
}
