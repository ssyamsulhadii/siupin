<div class="mb-3">
    <label class="form-label">Pilih Pegawai</label>
    <select class="form-select select2" name="pegawai_id">
        <option value="">Select</option>
        @foreach ($list_pegawai as $pegawai)
            <option value="{{ $pegawai->id }}" @selected($pegawai->id == old('pegawai_id', $penerima_berkas->pegawai_id ?? ''))>
                {{ $pegawai->nip }} || {{ $pegawai->nama }}
            </option>
        @endforeach
    </select>
    @error('pegawai_id')
        <small class="text-danger">Kolom pilih pegawai wajib dipilih.</small>
    @enderror
</div>
<x-forms.input name="nama" label="Nama" item="{{ $penerima_berkas->nama ?? '' }}"></x-forms.input>
<x-forms.input name="telpon" label="Telpon" item="{{ $penerima_berkas->telpon ?? '' }}" type="number"></x-forms.input>
<x-forms.input name="tanggal_pengambilan" label="Tanggal Pengambilan"
    item="{{ isset($penerima_berkas) ? $penerima_berkas->tanggal_pengambilan->isoFormat('Y-MM-DD') : '' }}"
    type="date"></x-forms.input>
<x-forms.textarea name="keterangan" label="Keterangan" item="{{ $penerima_berkas->keterangan ?? '' }}"
    rows="3"></x-forms.textarea>

<x-forms.btn-group-form></x-forms.btn-group-form>






@push('libs-style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
@endpush
@push('libs-script')
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
