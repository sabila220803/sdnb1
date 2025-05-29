<?php

namespace App\Http\Requests\Galeri;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGaleriRequest extends FormRequest
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
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Maksimal 2MB
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul galeri harus diisi.',
            'judul.string' => 'Judul galeri harus berupa teks.',
            'judul.max' => 'Judul galeri maksimal 255 karakter.',
            'deskripsi.required' => 'Deskripsi galeri harus diisi.',
            'deskripsi.string' => 'Deskripsi galeri harus berupa teks.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, svg.',
            'foto.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
