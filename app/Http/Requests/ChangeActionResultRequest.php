<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ChangeActionResultRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->role === 'employee';
    }

    public function rules(): array
    {
        return [
            'action_id' => 'required|exists:actions,id',
            'result' => 'required|string',
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator): void {
        throw new ValidationException($validator, response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
