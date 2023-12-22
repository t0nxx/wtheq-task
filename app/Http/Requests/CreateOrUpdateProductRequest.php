<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateProductRequest extends FormRequest
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
            'name'                      => [CreateOrUpdateRule(), 'string', 'min:3'],
            'description'               => [CreateOrUpdateRule(), 'string', 'min:3'],
            'price'                     => [CreateOrUpdateRule(), 'integer', 'min:1'],
            "is_active"                    => ['nullable', 'boolean'],
            "image"                    => ['nullable', 'string']
        ];
    }
}
