<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class AssignCustomerToEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:users,id,role,employee',
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator): void {
        throw new ValidationException($validator, response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
