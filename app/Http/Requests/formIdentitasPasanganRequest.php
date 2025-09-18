<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formIdentitasPasanganRequest extends FormRequest
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
            'mempunyai_pasangan' => 'required|in:ya,tidak,bercerai',
            'status_pasangan' => 'required_unless:mempunyai_pasangan,tidak',
            'nama_pasangan' => 'required_unless:mempunyai_pasangan,tidak',
            'nik_pasangan' => 'required_unless:mempunyai_pasangan,tidak|size:16',
            'pekerjaan_pasangan' => 'required_unless:mempunyai_pasangan,tidak',
            'tanggal_lahir_pasangan' => 'required_unless:mempunyai_pasangan,tidak',
            'tanggal_meninggal_pasangan' => 'sometimes',
            'no_akta_nikah' => 'required_unless:mempunyai_pasangan,tidak',
            'tanggal_menikah' => 'required_unless:mempunyai_pasangan,tidak',
            'tanggal_bercerai' => 'required_if:mempunyai_pasangan,bercerai',
            'mempunyai_anak' => 'required_unless:mempunyai_pasangan,tidak',
            'jumlah_anak' => 'required_unless:mempunyai_pasangan,tidak|required_if:mempunyai_anak,1',
            'done_partner' => 'sometimes',
        ];
    }
    public function messages(): array
    {
        return [
            'mempunyai_pasangan.required' => 'Kolom pasangan wajib dipilih.'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(
            [
                'done_partner' => true,
            ]
        );
    }
}
