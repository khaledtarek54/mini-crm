<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class AddActionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->role === 'employee';
    }

    public function rules(): array
    {
        return [
            'action_type' => 'required|in:call,visit,follow_up',
            'result' => 'required|string',
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator): void {
        throw new ValidationException($validator, response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
