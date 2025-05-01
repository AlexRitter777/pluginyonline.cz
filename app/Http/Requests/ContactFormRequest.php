<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'data.name' => 'required|min:3|max:50',
            'data.email' => 'required|email',
            'data.company' => 'nullable|min:3|max:50',
            'data.phone' => 'required|min:3|max:50',
            'data.message' => 'required|min:3|max:1000',
            'data.privacy' => 'accepted'
        ];
    }
}
