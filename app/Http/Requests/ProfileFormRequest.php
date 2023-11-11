<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
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
        return  [
            'photo_path' => ['nullable', 'max:255', 'string'],
            'email' => 'nullable|email',
            'salutation' => ['required', 'in:mr,sr,di'],
            'titel' => ['nullable', 'max:255', 'string'],
            'firstname' => ['required', 'max:255', 'string'],
            'lastname' => ['required', 'max:255', 'string'],
            'birth_date' => ['required', 'date'],
            'birth_name' => ['nullable', 'max:255', 'string'],
            'place_birth' => ['required', 'max:255', 'string'],
            'height' => ['nullable', 'numeric'],
            'weight' => ['nullable', 'numeric'],
            'blood_type' => ['nullable', 'in:A+,A-,B+,B-,AB+,AB-,O+,O-'],
            'user_id' => ['nullable', 'exists:users,id'],
        ];
    }
}
