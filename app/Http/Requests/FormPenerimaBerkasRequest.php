<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormPenerimaBerkasRequest extends FormRequest
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
            'nama' => 'required|string',
            'telpon' => 'required|string|max:15',
            'tanggal_pengambilan' => 'required|date',
            'keterangan' => 'sometimes|string',
            'pegawai_id' => 'required|exists:pegawai,id',
        ];
    }
}
