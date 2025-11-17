<div class="row">
    <div class="col-lg-6">
        <x-forms.input name="surat_pengantar_pimpinan" label="Surat Pengantar Pimpinan" type="file"
            accept=".pdf"></x-forms.input>
        <x-others.alert-view-dokumen dokumen="{{ $pegawai->surat_pengantar_pimpinan }}"
            url="{{ $pegawai->path_surat_pengantar_pimpinan }}">
        </x-others.alert-view-dokumen>

        <x-forms.input name="surat_pernyataan_pemohon" label="Surat Permohonan Pensiun" type="file"
            accept=".pdf"></x-forms.input>
        <x-others.alert-view-dokumen dokumen="{{ $pegawai->surat_pernyataan_pemohon }}"
            url="{{ $pegawai->path_surat_pernyataan_pemohon }}">
        </x-others.alert-view-dokumen>


        <x-forms.input name="surat_pernyataan_disiplin" label="Surat Pernyataan Disiplin" type="file"
            accept=".pdf"></x-forms.input>
        <x-others.alert-view-dokumen dokumen="{{ $pegawai->surat_pernyataan_disiplin }}"
            url="{{ $pegawai->path_surat_pernyataan_disiplin }}">
        </x-others.alert-view-dokumen>

        <x-forms.input name="surat_pernyataan_pidana" label="Surat Pernyataan Pidana" type="file"
            accept=".pdf"></x-forms.input>
        <x-others.alert-view-dokumen dokumen="{{ $pegawai->surat_pernyataan_pidana }}"
            url="{{ $pegawai->path_surat_pernyataan_pidana }}">
        </x-others.alert-view-dokumen>
    </div>
    <div class="col-lg-6">
        <x-forms.input name="sk_cpns" label="SK CPNS" type="file" accept=".pdf"></x-forms.input>
        <x-others.alert-view-dokumen dokumen="{{ $pegawai->sk_cpns }}" url="{{ $pegawai->path_sk_cpns }}">
        </x-others.alert-view-dokumen>

        <x-forms.input name="sk_pns" label="SK PNS" type="file" accept=".pdf"></x-forms.input>
        <x-others.alert-view-dokumen dokumen="{{ $pegawai->sk_pns }}" url="{{ $pegawai->path_sk_pns }}">
        </x-others.alert-view-dokumen>

        <x-forms.input name="sk_pangkat_terakhir" label="SK Pangkat Terakhir" type="file"
            accept=".pdf"></x-forms.input>
        <x-others.alert-view-dokumen dokumen="{{ $pegawai->sk_pangkat_terakhir }}"
            url="{{ $pegawai->path_sk_pangkat_terakhir }}">
        </x-others.alert-view-dokumen>


        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</div>
