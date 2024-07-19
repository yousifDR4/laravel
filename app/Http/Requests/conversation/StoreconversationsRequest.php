<?php

namespace App\Http\Requests\conversation;

use Illuminate\Foundation\Http\FormRequest;

class StoreconversationsRequest extends FormRequest
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
         'user_id'=>'required|numeric'
        ];
    }
    public function messages(): array
    {
        return [
            'user_id.required' => 'The sender ID field is required.',
            'user_id.numeric' => 'The sender ID must be a number.',
        ];
    }
}
