<div class="row">
    <div class="col-lg-6">
        <x-forms.selection-group name='jenis_pensiun_id' label='Jenis Pensiun'
            item="{{ $pegawai->jenis_pensiun_id ?? '' }}" :items="$list_jenis_pensiun" />
        <x-forms.input name="nama" label="Nama Lengkap <small class='text-danger'>Dengan Gelar</small>"
            item="{{ $pegawai->nama ?? '' }}" phr="AHMAD YADI, S.Kom., M.Kom"></x-forms.input>
        <x-forms.input name="nip" label="Nomor Induk Pegawai (NIP) <small class='text-danger'>Tanpa Spasi</small>"
            item="{{ $pegawai->nip ?? '' }}" type="number" phr="******************"></x-forms.input>
        <x-forms.input name="nkk" label="Nomor Kartu Keluarga (NKK)" item="{{ $pegawai->nkk ?? '' }}" type="number"
            phr="****************"></x-forms.input>
        <x-forms.input name="nik" label="Nomor Induk Kependudukan (NIK)" item="{{ $pegawai->nik ?? '' }}"
            type="number" phr="****************"></x-forms.input>
        <x-forms.input name="tanggal_lahir" label="Tanggal Lahir"
            item="{{ $pegawai?->tanggal_lahir->format('Y-m-d') ?? '' }}" type="date"></x-forms.input>
        <x-forms.selection-group name='jenis_kelamin' label='Jenis Kelamin' item="{{ $pegawai->jenis_kelamin ?? '' }}"
            :items="$pil_jk" />
        <x-forms.textarea name="alamat_sekarang" label="Alamat Sekarang" item="{{ $pegawai->alamat_sekarang ?? '' }}"
            rows="3"></x-forms.textarea>
    </div>
    <div class="col-lg-6">
        <x-forms.input name="tanggal_meninggal" label="Tanggal Meninggal (Diisi Apabila Jenis Pensiun Jada/Duda)"
            item="" type="date"></x-forms.input>
        <x-forms.selection-group name='jabatan_nominatif_id' label='Jabatan Nominatif'
            item="{{ $pegawai->jabatan_nominatif_id ?? '' }}" :items="$list_jabatan_nominatif" />
        <x-forms.input name="unit_organisasi" label="Unit Organisasi" item="{{ $pegawai->unit_organisasi ?? '' }}"
            phr="Nama Kantor/Sekolah"></x-forms.input>
        <x-forms.input name="jabatan" label="Jabatan" item="{{ $pegawai->jabatan ?? '' }}"
            phr="Nama Jabatan Struktural/Fungsional/Pelaksana"></x-forms.input>

        <x-forms.selection-group name='pangkat_golongan' label='Pangkat Golongan'
            item="{{ $pegawai->pangkat_golongan ?? '' }}" :items="$pil_pangkat_golongan" />

        <x-forms.input name="telpon" label="Telpon" item="{{ $pegawai->telpon ?? '' }}" type="number"
            phr="0812XXXXXXXX"></x-forms.input>
        <x-forms.textarea name="alamat_pensiun" label="Alamat Pensiun" item="{{ $pegawai->alamat_pensiun ?? '' }}"
            rows="3"></x-forms.textarea>
    </div>

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
        @if ($pegawai)
            <a href="{{ route('identitas-pasangan.form', ['pegawai' => $pegawai->nip]) }}"
                class="btn btn-warning">Berikutnya</a>
        @endif
    </div>
</div>
