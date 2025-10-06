<div class="row">
    <div class="col-lg-6">
        <x-forms.input name="nik" label="Nomor Induk Kependudukan (NIK)" item="" type="number"></x-forms.input>
        <x-forms.input name="nama" label="Nama" item=""></x-forms.input>
        <x-forms.input name="tanggal_lahir" label="Tanggal Lahir" item="" type="date"></x-forms.input>
        <x-forms.selection-group name='jenis_kelamin' label='Jenis Kelamin' item="" :items="$pil_jk" />
    </div>
    <div class="col-lg-6">
        <x-forms.selection-group name='menikah' label='Sudah Menikah?' item="" :items="$pil_umum" />
        <x-forms.input name="pekerjaan" label="Pekerjaan" item=""></x-forms.input>
        <x-forms.input name="telpon" label="Telpon" item="" type="number"></x-forms.input>
        <x-forms.input name="alamat" label="Alamat" item=""></x-forms.input>
    </div>
    <div class="form-group mt-3">
        <a class="btn btn-warning"
            href="{{ route('identitas-pasangan.form', ['pegawai' => $pegawai->nip]) }}">Sebelumnya</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>
