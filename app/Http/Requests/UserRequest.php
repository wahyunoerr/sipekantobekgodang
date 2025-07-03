<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,' . $this->user,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|exists:roles,name',
            'nik' => 'required|string|size:16|unique:users,nik,' . $this->user,
            'nokk' => 'required|string|size:16',
            'alamat' => 'required|string',
            'foto' => 'nullable|string',
            'jenis_kelamin' => 'required|in:L,P',
            'fotocopy_kk' => 'nullable|string',
            'fotocopy_ktp' => 'nullable|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal 8 karakter.',
            'role.required' => 'Peran wajib diisi.',
            'role.string' => 'Peran harus berupa teks.',
            'role.exists' => 'Peran tidak valid.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.string' => 'NIK harus berupa teks.',
            'nik.size' => 'NIK harus 16 karakter.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'nokk.required' => 'No KK wajib diisi.',
            'nokk.string' => 'No KK harus berupa teks.',
            'nokk.size' => 'No KK harus 16 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'foto.string' => 'Foto harus berupa teks.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'jenis_kelamin.in' => 'Jenis kelamin tidak valid.',
            'fotocopy_kk.string' => 'Fotocopy KK harus berupa teks.',
            'fotocopy_ktp.string' => 'Fotocopy KTP harus berupa teks.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tempat_lahir.string' => 'Tempat lahir harus berupa teks.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir tidak valid.',
            'agama.required' => 'Agama wajib diisi.',
            'agama.string' => 'Agama harus berupa teks.',
            'pekerjaan.required' => 'Pekerjaan wajib diisi.',
            'pekerjaan.string' => 'Pekerjaan harus berupa teks.',
        ];
    }
}
