<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|min:9',
            'contact' => 'required|size:9|unique:contacts',
            'email' => 'required|email|unique:contacts',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'A name is required',
            'name.min' => 'The name is too short',
            'contact.required' => 'A contact is required',
            'contact.size' => 'The contact need to be 9 digits',
            'contact.unique' => 'Sorry, this contact is already registered in our database',
            'email.required' => 'An email is required',
            'email.email' => 'Please, inform a valid email',
            'email.unique' => 'Sorry, this email is already registered in our database',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'contact' => 'Phone number',
            'email' => 'E-mail address',
        ];
    }
}