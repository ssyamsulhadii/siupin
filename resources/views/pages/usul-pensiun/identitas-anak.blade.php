@extends('layouts.app')
@section('content')
    <x-others.page-title title="Usul Pensiun" subtitle="Identitas Anak"
        link="{{ route('identitas-diri.form') }}"></x-others.page-title>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-footer bg-soft-primary">
                    <h3 class="card-title" style="font-size: 18px">Form Identitas Anak</h3>
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

                    <form action="{{ route('identitas-anak.store', ['pegawai' => $pegawai->nip]) }}" method="POST">
                        @csrf
                        @include('pages.usul-pensiun.identitas-anak-form')
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered" style="border: 1px rgb(74, 74, 74)">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Menikah</th>
                                    <th>Telpon</th>
                                    <th>Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pegawai->listDetailAnak as $detail_anak)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $detail_anak->nik }}</td>
                                        <td>{{ $detail_anak->nama }}</td>
                                        <td>{{ $detail_anak->tanggal_lahir->isoFormat('DD-MMMM-YYYY') }}</td>
                                        <td>{{ $detail_anak->ket_jenis_kelamin }}</td>
                                        <td>{{ $detail_anak->ket_menikah }}</td>
                                        <td>{{ $detail_anak->telpon }}</td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('identitas-anak.destroy', ['detail_anak' => $detail_anak->id]) }}"
                                                class="d-inline form-hapus">
                                                @csrf @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-danger btn-sm waves-effect waves-light">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Data Identitas Anak Belum Ada.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group mt-3">
                        @if (count($pegawai->listDetailAnak) == $pegawai->jumlah_anak)
                            <a href="{{ route('upload-dokumen.form', ['pegawai' => $pegawai->nip]) }}"
                                class="btn btn-warning">Berikutnya</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
