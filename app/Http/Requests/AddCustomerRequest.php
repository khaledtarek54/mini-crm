<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class AddCustomerRequest extends FormRequest
{

    public function authorize(): bool
    {
        return in_array(auth()->user()->role, ['admin', 'employee']);
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:customers,email',
            'address' => 'required|string|max:255',
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator): void {
        throw new ValidationException($validator, response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
