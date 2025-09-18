<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formIdentitasAnakRequest extends FormRequest
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
            'nik' => 'required|size:16|unique:detail_anak',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'menikah' => 'required',
            'alamat' => 'required|string',
            'pekerjaan' => 'required|string',
            'telpon' => 'required|max:15',
            'pegawai_id' => 'sometimes'
        ];
    }

    public function messages(): array
    {
        return [
            'menikah.required' => 'Kolom sudah menikah wajib dipilih.',
            'jenis_kelamin.required' => 'Kolom Jenis Kelamin wajib dipilih.',
        ];
    }

    protected function prepareForValidation()
    {
        if (count($this->pegawai->listDetailAnak) == $this->pegawai->jumlah_anak) {
            return back()->with('swal-warning', 'Data anak sudah terpenuhi. Silakan edit, jumlah anak');
        }
        $this->merge(
            [
                'pegawai_id' => $this->pegawai->id,
            ]
        );
    }
}
