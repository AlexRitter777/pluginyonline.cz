<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'route_name' => 'nullable|min:3|max:100',
            'content' => 'required|min:3',
            'position' => 'nullable|integer',
            'is_published' => 'required|boolean',
            'visible_in_footer' => 'required|boolean',
        ];
    }
}
