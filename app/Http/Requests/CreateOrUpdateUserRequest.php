<?php

namespace App\Http\Requests;

use App\Enums\UserTypesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CreateOrUpdateUserRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
            'name'                      => [CreateOrUpdateRule(), 'min:3', 'string'],
            'username'                  => [CreateOrUpdateRule(),  'string', Rule::unique('users')->ignore(request()->user)],
            'email'                     => [CreateOrUpdateRule(), 'email',  Rule::unique('users')->ignore(request()->user)],
            'password'                  => [CreateOrUpdateRule(), 'min:6', 'string'],
            'type'                      => [CreateOrUpdateRule(), Rule::enum(UserTypesEnum::class)],
            "avatar"                    => ['nullable', 'string']
        ];
    }
}
