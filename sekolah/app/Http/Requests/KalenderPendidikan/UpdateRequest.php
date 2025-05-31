<?php

namespace App\Http\Requests\KalenderPendidikan;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf|max:2048', // Validasi file PDF dengan ukuran maksimal 2MB
            'tahun_ajaran_1' => 'required|string|max:2',
            'tahun_ajaran_2' => 'required|string|max:2',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama Kalender Pendidikan harus diisi.',
            'nama.string' => 'Nama Kalender Pendidikan harus berupa teks.',
            'nama.max' => 'Nama Kalender Pendidikan tidak boleh lebih dari 255 karakter.',
            'jenis.required' => 'Jenis Kalender Pendidikan harus diisi.',
            'jenis.string' => 'Jenis Kalender Pendidikan harus berupa teks.',
            'jenis.max' => 'Jenis Kalender Pendidikan tidak boleh lebih dari 255 karakter.',
            'file.mimes' => 'File harus berupa PDF.',
            'file.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            'tahun_ajaran_1.required' => 'Tahun ajaran bagian pertama harus diisi.',
            'tahun_ajaran_1.string' => 'Tahun ajaran bagian pertama harus berupa teks.',
            'tahun_ajaran_1.max' => 'Tahun ajaran bagian pertama maksimal 2 karakter.',
            'tahun_ajaran_2.required' => 'Tahun ajaran bagian kedua harus diisi.',
            'tahun_ajaran_2.string' => 'Tahun ajaran bagian kedua harus berupa teks.',
            'tahun_ajaran_2.max' => 'Tahun ajaran bagian kedua maksimal 2 karakter.'
        ];
    }
}
