<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            //
             'name' => 'required|string|max:255',
            'email' => 'required|email'
        ];
    }

     public function messages()
    {
        return [
            'name.required' => 'Please enter your name.',
            'name.string' => 'The name must be a valid text string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.required' => 'We need your email address to proceed.',
            'email.email' => 'Bitte gib eine gültig Email an.'
        ];
    }

}
