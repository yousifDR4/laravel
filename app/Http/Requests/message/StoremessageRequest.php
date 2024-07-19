<?php
namespace App\Http\Requests\message;
use App\Models\conversations;
use Illuminate\Foundation\Http\FormRequest;

class StoremessageRequest extends FormRequest
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
            'body' => 'required|string',
             'conversations_id' => 'required|numeric',
            'sender_id' => 'required|numeric',
            ];

    }
    public function messages(): array
    {
        return [
            'conversations_id.required' => 'The conversations ID field is required.',
            'conversations_id.numeric' => 'The conversations ID must be a number.',
            'body.required' => 'The body field is required.',
            'body.string' => 'The content must be a string.',
            'sender_id.required' => 'The sender ID field is required.',
            'sender_id.numeric' => 'The sender ID must be a number.',
        ];
    }
}
