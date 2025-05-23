<?php

namespace App\Http\Requests;

use App\Rules\SummernoteContent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePortfolioRequest extends FormRequest
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
            'name' => 'required|min:3|max:65',
            'type' => 'required|min:3|max:65',
            'purpose' => 'required|min:3|max:170',
            'features' => 'required|min:3|max:250',
            'requirements' => 'required|min:3|max:170',
            'description' => 'required|min:3|max:250',
            'content' => new SummernoteContent,
            'is_published' => 'required|boolean',
            'thumbnail' => 'nullable|image|max:6144',
            'old_thumbnail' => 'nullable|string',
            'position' => 'nullable|integer|min:1',
            'images' => [
                'array',
                Rule::requiredIf(function () {
                    $paths = $this->input('paths');
                    return $paths === '[]';
                })
            ],
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
