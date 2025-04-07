<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator): void
    {
        throw new ValidationException($validator, response()->json([
            'errors' => $validator->errors(),
        ], 422));

    }
}
