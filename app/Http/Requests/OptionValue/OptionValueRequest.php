<?php

namespace App\Http\Requests\OptionValue;

use Illuminate\Foundation\Http\FormRequest;

class OptionValueRequest extends FormRequest
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
            'option_id' => 'required|exists:options,id',
            'value' => 'required|string',
        ];
    }
}
