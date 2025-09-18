<div class="row">
    <div class="col-lg-6">
        <x-forms.input name="surat_pmk" label="Surat PMK (diupload jika ada)" type="file" accept=".pdf"></x-forms.input>
        <x-others.alert-view-dokumen dokumen="{{ $pegawai->surat_pmk }}" namafile="{{ $pegawai->surat_pmk }}"
            url="{{ $pegawai->path_surat_pmk }}">
        </x-others.alert-view-dokumen>

        <x-forms.input name="surat_kematian_pasangan" label="Surat Kematian Pasangan (diupload jika ada)" type="file"
            accept=".pdf"></x-forms.input>
        <x-others.alert-view-dokumen dokumen="{{ $pegawai->surat_kematian_pasangan }}"
            namafile="{{ $pegawai->surat_kematian_pasangan }}" url="{{ $pegawai->path_surat_kematian_pasangan }}">
        </x-others.alert-view-dokumen>


        <x-forms.input name="surat_janda_duda" label="Surat Janda / Duda (diupload jika ada)" type="file"
            accept=".pdf"></x-forms.input>
        <x-others.alert-view-dokumen dokumen="{{ $pegawai->surat_janda_duda }}"
            namafile="{{ $pegawai->surat_janda_duda }}" url="{{ $pegawai->path_surat_janda_duda }}">
        </x-others.alert-view-dokumen>

        <x-forms.input name="akta_menikah" label="Akta Menikah (diupload jika ada)" type="file"
            accept=".pdf"></x-forms.input>
        <x-others.alert-view-dokumen dokumen="{{ $pegawai->akta_menikah }}" namafile="{{ $pegawai->akta_menikah }}"
            url="{{ $pegawai->path_akta_menikah }}">
        </x-others.alert-view-dokumen>
    </div>

    <div class="col-lg-6">
        <x-forms.input name="skp_pegawai" label="SKP Pegawai" type="file" accept=".pdf"></x-forms.input>
        <x-others.alert-view-dokumen dokumen="{{ $pegawai->skp_pegawai }}" namafile="{{ $pegawai->skp_pegawai }}"
            url="{{ $pegawai->path_skp_pegawai }}">
        </x-others.alert-view-dokumen>

        <x-forms.input name="foto_ktp" label="Foto KTP (Dokumen dalam bentuk pdf)" type="file"
            accept=".pdf"></x-forms.input>
        <x-others.alert-view-dokumen dokumen="{{ $pegawai->foto_ktp }}" namafile="{{ $pegawai->foto_ktp }}"
            url="{{ $pegawai->path_foto_ktp }}">
        </x-others.alert-view-dokumen>

        <x-forms.input name="foto_kk" label="Foto KK (Dokumen dalam bentuk pdf)" type="file"
            accept=".pdf"></x-forms.input>
        <x-others.alert-view-dokumen dokumen="{{ $pegawai->foto_kk }}" namafile="{{ $pegawai->foto_kk }}"
            url="{{ $pegawai->path_foto_kk }}">
        </x-others.alert-view-dokumen>

        <x-forms.input name="pas_foto" label="Pas Foto (Dokumen dalam bentuk png/jpg/jpeg)" type="file"
            accept=".png,.jpg,.jpeg">
        </x-forms.input>

        <x-others.alert-view-dokumen dokumen="{{ $pegawai->pas_foto }}" namafile="{{ $pegawai->pas_foto }}"
            url="{{ $pegawai->path_pas_foto }}">
        </x-others.alert-view-dokumen>
    </div>

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>
