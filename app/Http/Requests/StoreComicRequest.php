<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
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
            'title' => 'required|min:3|max:70',
            'price' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Il campo "Titolo" è obbligatorio.',
            'title.min' => 'Il campo "Titolo" deve contenere almeno :min caratteri.',
            'title.max' => 'Il campo "Titolo" non può superare :max caratteri.',
            'price.required' => 'Il campo "Prezzo" è obbligatorio.',
        ];
    }
}
