<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'body' => 'array',
            'title' => 'required|string',
            'content' => 'required|string',
            'user_id' => 'required|numeric',
        ];
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'body.required' => 'The body field is required.',
            'body.array' => 'The body must be an array.',
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'content.required' => 'The content field is required.',
            'content.string' => 'The content must be a string.',
            'user_id.required' => 'The user ID field is required.',
            'user_id.numeric' => 'The user ID must be a number.',
        ];
    }
}
