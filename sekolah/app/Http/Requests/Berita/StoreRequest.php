<?php

namespace App\Http\Requests\Berita;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'penerbit' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul berita harus diisi.',
            'judul.string' => 'Judul berita harus berupa teks.',
            'judul.max' => 'Judul berita tidak boleh lebih dari 255 karakter.',
            'penerbit.required' => 'Penerbit berita harus diisi.',
            'penerbit.string' => 'Penerbit berita harus berupa teks.',
            'penerbit.max' => 'Penerbit berita tidak boleh lebih dari 255 karakter.',
            'deskripsi.required' => 'Deskripsi berita harus diisi.',
            'deskripsi.string' => 'Deskripsi berita harus berupa teks.',
            'foto.required' => 'Foto berita harus diunggah.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diperbolehkan adalah jpeg, png, atau jpg.',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ];
    }
}
