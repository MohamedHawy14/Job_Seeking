<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Listingstoreandupdate extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titleAr' => ['required', 'string', 'max:255'],
            'titleEn' => ['required', 'string', 'max:255'],
            'tags' => ['required', 'string'],
            'company' => ['required', 'string'],
            'location' => ['required', 'string'],
            'email' => ['required', 'email'],
            'website' => ['required', 'url'],
            'descriptionAr' => ['required', 'string'],
            'descriptionEn' => ['required', 'string'],
            'logo' => ['sometimes', 'nullable', 'file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }
}
