<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtikelFormRequest extends FormRequest
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
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'link' => ['required', 'string', 'max:100'],
            'judul_artikel' => ['required', 'string', 'max:100'],
            'nama_resto' => ['required', 'string', 'max:100'],
            'isi_artikel' => ['required', 'string'],
            'status_publish' => ['required', 'string', 'in:jakarta,kalsel'],

        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Kolom gambar wajib diisi.',
            'link.required' => 'Kolom header wajib diisi.',
            'nama_resto.required' => 'Kolom header wajib diisi.',
            'judul_artikel.required' => 'Kolom judul artikel wajib diisi.',
            'isi_artikel.required' => 'Kolom isi artikel wajib diisi.',
            'status_publish.required' => 'Kolom status publish wajib diisi.',
        ];
    }
}
