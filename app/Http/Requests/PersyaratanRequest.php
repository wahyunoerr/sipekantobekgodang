<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersyaratanRequest extends FormRequest
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
            'name' => 'required|string|max:100',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nama persyaratan wajib diisi.',
            'name.string' => 'Nama persyaratan harus berupa teks.',
            'name.max' => 'Nama persyaratan maksimal 100 karakter.',
        ];
    }
}
