@extends('layouts.app')
@section('content')
    <x-others.page-title title="Keterangan" subtitle="Tambah Data"
        link="{{ route('pegawai.index') }}"></x-others.page-title>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-footer bg-soft-primary">
                    <h3 class="card-title" style="font-size: 18px">Form Keterangan</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pegawai.keterangan', ['pegawai' => $pegawai->nip]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <x-forms.input name="nama" label="Nama Lengkap" item="{{ $pegawai->nama }}"
                            disabled></x-forms.input>

                        <x-forms.input name="nip" label="NIP" item="{{ $pegawai->nip }}" disabled></x-forms.input>


                        <x-forms.input name="pertek" label="Pertek" type="file" accept=".pdf"></x-forms.input>
                        <x-others.alert-view-dokumen dokumen="{{ $pegawai->pertek }}" namafile="{{ $pegawai->pertek }}"
                            url="{{ $pegawai->path_pertek }}">
                        </x-others.alert-view-dokumen>
                        <x-forms.textarea name="status_usul" label="Keterangan" item="{{ $pegawai->status_usul }}"
                            rows="3"></x-forms.textarea>
                        <x-forms.btn-group-form></x-forms.btn-group-form>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
