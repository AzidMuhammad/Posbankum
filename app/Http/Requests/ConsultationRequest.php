<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'nik' => 'required|digits:16',
            'phone' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string',
            'case_category' => 'required|string',
            'case_description' => 'required|string',
            'evidence_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'nik.required' => 'NIK wajib diisi',
            'nik.digits' => 'NIK harus 16 digit',
            'phone.required' => 'Nomor telepon wajib diisi',
            'email.email' => 'Format email tidak valid',
            'address.required' => 'Alamat wajib diisi',
            'case_category.required' => 'Kategori kasus wajib dipilih',
            'case_description.required' => 'Deskripsi permasalahan wajib diisi',
            'evidence_file.mimes' => 'File harus berformat PDF, JPG, JPEG, atau PNG',
            'evidence_file.max' => 'Ukuran file maksimal 5MB',
        ];
    }
}