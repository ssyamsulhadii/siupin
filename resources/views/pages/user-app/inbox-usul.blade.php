@extends('layouts.app')
@section('content')
    <x-others.page-title title="Inbox Usul" subtitle="Tampil Data" link="{{ route('inbox-usul.view') }}"></x-others.page-title>

    <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-center">
            <img class="" src="{{ asset('assets/images/inbox-usul.png') }}" style="max-height: 270px">
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title" style="font-size: 23px">Cek Usul Pensiun</h4>
                    <p class="card-title-desc">
                    <div class="alert alert-warning" role="alert">
                        Masukkan NIP untuk memeriksa status usulan. Sistem akan menampilkan informasi aktif,
                        sedang diproses, diusulkan, atau telah selesai.
                    </div>
                    </p>

                    <form action="#" class="custom-validation" novalidate="">
                        <div class="mb-3">
                            <h5>NIP</h5>
                            <div class="row">
                                <form action="{{ route('inbox-usul.view') }}" method="GET">
                                    <div class="input-group">
                                        <input type="number" class="form-control"name="nip" value="{{ request('nip') }}">
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @if (request('nip'))
        <div class="row justify-content-center mt-3">
            <div class="col-lg-6">
                <div class="card border border-primary">
                    <div class="card-header bg-transparent border-primary">
                        <h5 class="my-0 text-primary"><i class="ri-search-2-line me-3"></i>Informasi Usul Pensiun</h5>
                    </div>
                    <div class="card-body bg-soft-light">
                        @if ($pegawai)
                            <table class="table table-hover">
                                <tr>
                                    <td style="width: 170px">Nama</td>
                                    <td>{!! $pegawai->kode_progress_badge !!}</td>
                                </tr>
                                <tr>
                                    <td>NIP</td>
                                    <td>{{ $pegawai->nip }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Usulan</td>
                                    <td>{{ $pegawai->jenisPensiun->nama }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="mt-3">Status Usulan</div>
                                    </td>
                                    <td>
                                        <div class="alert alert-info mb-0" role="alert">
                                            @if ($pegawai->data_done)
                                                {{ $pegawai->status_usul }}
                                            @else
                                                @if ($pegawai->done_profile && !$pegawai->done_partner)
                                                    Data Identitas Pasangan Belum Diinput
                                                @elseif ($pegawai->done_partner && $pegawai->mempunyai_anak)
                                                    @if (count($pegawai->listDetailAnak) == $pegawai->jumlah_anak)
                                                        Data Dokumen Belum Diupload
                                                    @else
                                                        Data Identitas Anak Belum Diinput
                                                    @endif
                                                @elseif ($pegawai->done_partner && !$pegawai->mempunyai_anak)
                                                    Data Dokumen Belum Diupload
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @if ($pegawai->data_done && $pegawai->pertek)
                                    <tr>
                                        <td>Lihat Pertek</td>
                                        <td>
                                            <x-others.alert-view-dokumen dokumen="{{ $pegawai->pertek }}"
                                                namafile="{{ $pegawai->pertek }}" url="{{ $pegawai->path_pertek }}">
                                            </x-others.alert-view-dokumen>
                                        </td>
                                    </tr>
                                @endif

                                @if ($pegawai->penerimaBerkas)
                                    <tr>
                                        <td>Tanggal Terima</td>
                                        <td>{{ $pegawai->penerimaBerkas->tanggal_pengambilan->isoFormat('DD-MM-YYYY') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Penerima</td>
                                        <td>{{ $pegawai->penerimaBerkas->nama }}</td>
                                    </tr>
                                @endif
                            </table>
                        @else
                            <div class="alert alert-danger text-center" role="alert">
                                <h5> Data Usulan Tidak Ditemukan</h5>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
