<?php

namespace App\Http\Requests\Murid;

use Illuminate\Foundation\Http\FormRequest;

class MuridRequest extends FormRequest
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
            'kelas' => 'required|integer|between:1,6',
            'jenis_kelamin' => 'required|in:L,P',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.string' => 'Nama harus berupa string',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter',   
            'kelas.required' => 'Kelas tidak boleh kosong',
            'kelas.integer' => 'Kelas harus berupa angka',
            'kelas.between' => 'Kelas harus antara 1 dan 6',
            'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong',
            'jenis_kelamin.in' => 'Jenis kelamin harus L atau P',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Foto harus berupa jpeg, png, jpg',
            'foto.max' => 'Foto tidak boleh lebih dari 2MB'
        ];
    }
}
