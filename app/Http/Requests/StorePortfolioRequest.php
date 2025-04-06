<?php

namespace App\Http\Requests;

use App\Rules\SummernoteContent;
use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'title' => 'required|min:3|max:65',
            'name' => 'required|min:3|max:65',
            'type' => 'required|min:3|max:65',
            'purpose' => 'required|min:3|max:65',
            'features' => 'required|min:3|max:170',
            'requirements' => 'required|min:3|max:170',
            'description' => 'required|min:3|max:170',
            'content' => new SummernoteContent,
            'is_published' => 'required|boolean',
            'thumbnail' => 'nullable|image|max:6144',
            'position' => 'nullable|integer|min:1',
            'images' => 'required|array',
            'images.*' => 'nullable|image|max:6144',

        ];
    }

    public function messages(): array{
        return [
            'images.required' => 'You should upload at least one image.',
            'images.array' => 'You should upload at least one image.',
            'images.*.max' => 'Each uploaded file must be an image and not exceed :max kilobytes.',
            'images.*.image' => 'Each uploaded file must be an image and not exceed :max kilobytes.',
        ];
    }




}
