<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formUploadDokumen2Request extends FormRequest
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
        $xrule_1 = $this->pegawai->skp_pegawai ?  'sometimes' : 'required';
        $xrule_2 = $this->pegawai->foto_ktp ?  'sometimes' : 'required';
        $xrule_3 = $this->pegawai->foto_kk ?  'sometimes' : 'required';
        $xrule_4 = $this->pegawai->pas_foto ?  'sometimes' : 'required';
        return [
            'surat_pmk' => 'sometimes|file|mimes:pdf|max:750',
            'surat_kematian_pasangan' => 'sometimes|file|mimes:pdf|max:750',
            'surat_janda_duda' => 'sometimes|file|mimes:pdf|max:750',
            'akta_menikah' => 'sometimes|file|mimes:pdf|max:750',

            'skp_pegawai' => $xrule_1 . '|file|mimes:pdf|max:999',
            'foto_ktp' => $xrule_2 . '|file|mimes:pdf|max:750',
            'foto_kk' => $xrule_3 . '|file|mimes:pdf|max:750',
            'pas_foto' => $xrule_4 . '|file|mimes:png,jpg,jpeg|max:999',
            'done_document' => 'sometimes',
        ];
    }
}
