<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formUploadDokumen1Request extends FormRequest
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
        $xrule_1 = $this->pegawai->surat_pengantar_pimpinan ?  'sometimes' : 'required';
        $xrule_2 = $this->pegawai->surat_pernyataan_pemohon ?  'sometimes' : 'required';
        $xrule_3 = $this->pegawai->surat_pernyataan_disiplin ?  'sometimes' : 'required';
        $xrule_4 = $this->pegawai->surat_pernyataan_pidana ?  'sometimes' : 'required';
        $xrule_5 = $this->pegawai->sk_cpns ?  'sometimes' : 'required';
        $xrule_6 = $this->pegawai->sk_pns ?  'sometimes' : 'required';
        $xrule_7 = $this->pegawai->sk_pangkat_terakhir ?  'sometimes' : 'required';
        return [
            'surat_pengantar_pimpinan' => $xrule_1 . '|file|mimes:pdf|max:750',
            'surat_pernyataan_pemohon' => $xrule_2 . '|file|mimes:pdf|max:750',
            'surat_pernyataan_disiplin' => $xrule_3 . '|file|mimes:pdf|max:750',
            'surat_pernyataan_pidana' => $xrule_4 . '|file|mimes:pdf|max:750',
            'sk_cpns' => $xrule_5 . '|file|mimes:pdf|max:750',
            'sk_pns' => $xrule_6 . '|file|mimes:pdf|max:750',
            'sk_pangkat_terakhir' => $xrule_7 . '|file|mimes:pdf|max:750',
        ];
    }
}
