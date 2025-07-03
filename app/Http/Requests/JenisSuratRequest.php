<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JenisSuratRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'form_id' => 'required|exists:jenis_forms,id',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama jenis surat wajib diisi.',
            'name.string' => 'Nama jenis surat harus berupa teks.',
            'name.max' => 'Nama jenis surat maksimal 255 karakter.',
            'form_id.required' => 'Form wajib diisi.',
            'form_id.exists' => 'Formtidak valid.',
        ];
    }
}
