<x-forms.input name="nama" label="Nama" item="{{ $jenis_pensiun->nama ?? '' }}"></x-forms.input>
<x-forms.textarea name="keterangan" label="Keterangan" item="{{ $jenis_pensiun->keterangan ?? '' }}"
    rows="3"></x-forms.textarea>
<x-forms.btn-group-form></x-forms.btn-group-form>
