@extends('layouts.app')
@section('content')
    <x-others.page-title title="Usul Pensiun" subtitle="Upload Dokumen"
        link="{{ route('identitas-diri.form') }}"></x-others.page-title>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-footer bg-soft-primary">
                    <h3 class="card-title" style="font-size: 18px">Form Upload Dokumen</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <x-forms.input name="" label="Jenis Pensiun" item="{{ $pegawai->jenisPensiun->nama }}"
                                disabled></x-forms.input>
                        </div>
                        <div class="col-lg-4">
                            <x-forms.input name="" label="Nama Lengkap" item="{{ $pegawai->nama }}"
                                disabled></x-forms.input>
                        </div>
                        <div class="col-lg-4">
                            <x-forms.input name="" label="NIP" item="{{ $pegawai->nip }}"
                                disabled></x-forms.input>
                        </div>
                    </div>

                    <form action="{{ route('upload-dokumen1.form', ['pegawai' => $pegawai->nip]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @include('pages.usul-pensiun.upload-dokumen-form-1')
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('upload-dokumen2.form', ['pegawai' => $pegawai->nip]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @include('pages.usul-pensiun.upload-dokumen-form-2')
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if ($pegawai->done_document)
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="alert mb-3 text-dark col-lg-4" style="background: rgb(241, 228, 85)" role="alert">
                        Silakan klik tombol <b>Final</b> untuk menyimpan usulan.
                    </div>
                    <div class="button-items">
                        <a class="btn btn-warning"
                            href="{{ route('identitas-anak.form', ['pegawai' => $pegawai->nip]) }}">Sebelumnya</a>
                        {{-- <a href="{{ route('usul-pensiun.final', ['pegawai' => $pegawai->nip]) }}" class="btn btn-primary">
                            Final
                        </a> --}}
                        <form method="GET" action="{{ route('usul-pensiun.final', ['pegawai' => $pegawai->nip]) }}"
                            class="d-inline form-final">
                            @csrf @method('DELETE')
                            <button type="button" class="btn btn-primary">Final</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection


@push('script')
    <script>
        let semuaTombol = document.querySelectorAll('.form-final');
        semuaTombol.forEach(function(form) {
            form.addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'KONFIRMASI',
                    html: `Pastikan seluruh data yang Anda masukkan sudah benar dan sesuai.
                    Tekan tombol <b> Simpan </b> untuk menyimpan usulan, data akan terkunci dan tidak dapat diubah kembali.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Simpan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        form.submit();
                    }
                })
            });
        })
    </script>
@endpush
