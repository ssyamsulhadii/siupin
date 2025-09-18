<?php

namespace App\Http\Requests;

use App\Models\Pegawai;
use Illuminate\Foundation\Http\FormRequest;

class formIdentitasDiriRequest extends FormRequest
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
        $id = Pegawai::firstWhere('nip', request('nip'))?->id;
        return [
            'jenis_pensiun_id' => 'required|exists:jenis_pensiun,id',
            'jabatan_nominatif_id' => 'required|exists:jabatan_nominatif,id',
            'nama' => 'required',
            'nip' => 'required|size:18|unique:pegawai,nip,' . $id,
            'nkk' => 'required|size:16',
            'nik' => 'required|size:16',
            'tanggal_lahir' => 'required|date',
            'tanggal_meninggal' => 'sometimes',
            'alamat_sekarang' => 'required|string',
            'unit_organisasi' => 'required|string',
            'jabatan' => 'required|string',
            'pangkat_golongan' => 'required|string',
            'telpon' => 'required|max:15',
            'alamat_pensiun' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
        ];
    }

    public function messages(): array
    {
        return [
            'jenis_pensiun_id.required' => 'Kolom Jenis Pensiun wajib dipilih.',
            'jabatan_nominatif_id.required' => 'Kolom Jabatan Nominatif wajib dipilih.',
            'jenis_kelamin.required' => 'Kolom Jenis Kelamin wajib dipilih.',
        ];
    }
}
