<?php

namespace App\Http\Requests\Prestasi;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrestasiRequest extends FormRequest
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
            'nama_peserta' => 'required|string|max:255',
            'nama_lomba' => 'required|string|max:255',
            'tingkat' => 'required|string',
            'juara' => 'required|integer|min:1',
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'nama_peserta.required' => 'Nama peserta harus diisi.',
            'nama_peserta.string' => 'Nama peserta harus berupa teks.',
            'nama_peserta.max' => 'Nama peserta maksimal 255 karakter.',
            'nama_lomba.required' => 'Nama lomba harus diisi.',
            'nama_lomba.string' => 'Nama lomba harus berupa teks.',
            'nama_lomba.max' => 'Nama lomba maksimal 255 karakter.',
            'tingkat.required' => 'Tingkat lomba harus dipilih.',
            'tingkat.string' => 'Tingkat lomba harus berupa teks.',
            'juara.required' => 'Juara harus diisi.',
            'juara.integer' => 'Juara harus berupa angka.',
            'juara.min' => 'Juara minimal 1.',
            'tahun.required' => 'Tahun harus diisi.',
            'tahun.integer' => 'Tahun harus berupa angka.',
            'tahun.min' => 'Tahun minimal 2000.',
            'tahun.max' => 'Tahun maksimal adalah tahun ini.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg.',
            'foto.max' => 'Ukuran gambar maksimal 2MB.'
        ];
    }
}
