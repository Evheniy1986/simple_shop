<?php

namespace App\Http\Requests\PropertyProduct;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PropertyProductRequest extends FormRequest
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
            'property_id' => 'required|array',
            'property_id.*' => 'required|exists:properties,id',
            'value' => 'required|array',
            'value.*' => 'required|string',
        ];
    }

}
