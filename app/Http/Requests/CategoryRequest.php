<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
            'title' => ['required', 'string', 'min:3',],
            'description' => ['required', 'string', 'min:5'],
            'code' => ['required', 'string', Rule::unique('categories', 'code')->ignore($this->category)],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5000'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'code' => ($this->code ?? Str::slug($this->title))
        ]);
    }
}
