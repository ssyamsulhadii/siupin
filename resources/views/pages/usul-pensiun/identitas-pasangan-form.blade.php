<div class="row">
    <div class="col-lg-6">
        <x-forms.input name="nama" label="Nama Lengkap" item="{{ $pegawai->nama }}" disabled></x-forms.input>
        <x-forms.selection-group name='mempunyai_pasangan'
            label='Mempunyai Pasangan? Jika Tidak, abaikan isian berikutnya, langsung klik tombol simpan.'
            item="{{ $pegawai->mempunyai_pasangan ?? '' }}" :items="$pil_mempunyai_pasangan" />
        <x-forms.selection-group name='status_pasangan' label='Status' item="{{ $pegawai->status_pasangan ?? '' }}"
            :items="$pil_status_pasangan" />
        <x-forms.input name="nama_pasangan" label="Nama" item="{{ $pegawai->nama_pasangan }}"></x-forms.input>
        <x-forms.input name="nik_pasangan" label="Nomor Induk Kependudukan (NIK)" item="{{ $pegawai->nik_pasangan }}"
            type="number"></x-forms.input>
        <x-forms.input name="pekerjaan_pasangan" label="Pekerjaan"
            item="{{ $pegawai->pekerjaan_pasangan }}"></x-forms.input>
        <x-forms.input name="tanggal_lahir_pasangan" label="Tanggal Lahir" type="date"
            item="{{ $pegawai->tanggal_lahir_pasangan?->format('Y-m-d') ?? '' }}"></x-forms.input>
    </div>
    <div class="col-lg-6">
        <x-forms.input name="nip" label="NIP" item="{{ $pegawai->nip }}" disabled></x-forms.input>
        <x-forms.input name="no_akta_nikah" label="No Akta Nikah" item="{{ $pegawai->no_akta_nikah }}"></x-forms.input>
        <x-forms.input name="tanggal_menikah" label="Tanggal Menikah" type="date"
            item="{{ $pegawai->tanggal_menikah?->format('Y-m-d') ?? '' }}"></x-forms.input>
        <x-forms.input name="tanggal_bercerai" label="Tanggal Bercerai (Diisi apabila bercerai)" type="date"
            item="{{ $pegawai->tanggal_bercerai?->format('Y-m-d') ?? '' }}"></x-forms.input>
        <x-forms.input name="tanggal_meninggal_pasangan" label="Tanggal Meninggal (Diisi apabila pasangan meninggal)"
            type="date" item="{{ $pegawai->tanggal_meninggal_pasangan?->format('Y-m-d') ?? '' }}"></x-forms.input>
        <x-forms.selection-group name='mempunyai_anak' label='Apakah Mempunyai Anak?'
            item="{{ $pegawai->mempunyai_anak ?? '' }}" :items="$pil_umum" />

        <x-forms.selection-group name='jumlah_anak' label='Jumlah Anak' item="{{ $pegawai->jumlah_anak ?? '' }}"
            :items="$list_numbers" />
    </div>

    <div class="form-group" style="margin-top:37px">
        <a class="btn btn-warning"
            href="{{ route('identitas-diri.form', ['pegawai' => $pegawai->nip]) }}">Sebelumnya</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        @if ($pegawai->done_partner && $pegawai->mempunyai_anak)
            <a href="{{ route('identitas-anak.form', ['pegawai' => $pegawai->nip]) }}"
                class="btn btn-warning">Berikutnya</a>
        @elseif($pegawai->done_partner)
            <a href="{{ route('upload-dokumen.form', ['pegawai' => $pegawai->nip]) }}"
                class="btn btn-warning">Berikutnya</a>
        @endif
    </div>
</div>
