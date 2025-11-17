@extends('layouts.app')
@section('content')
    <x-others.page-title title="Pegawai" subtitle="Tampil Data" link="{{ route('pegawai.index') }}"></x-others.page-title>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                {{-- <div class="card-footer bg-soft-primary">
                    <div class="row">
                        <div class="col-sm-2">
                            <input class="form-control" type="date" value="2025-08-01" id="example-date-input">
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control" type="date" value="2011-08-31" id="example-date-input">
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Cari</button>
                        </div>
                    </div>
                </div> --}}
                <div class="card-body pb-1">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-sm-4">
                            <a href="{{ route('identitas-diri.form') }}"
                                class="btn btn-primary waves-effect waves-light">Tambah Usulan</a>
                            <a href="{{ route('pegawai.export') }}" class="btn text-white" style="background: green">Export
                                Excel</a>
                        </div>
                        <div class="col-sm-3">
                            <form action="{{ route('pegawai.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Ketikkan Nama/NIP Pegawai"
                                        name="search" value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table table-responsive">
                        <table class="table mb-0 table-bordered" style="border: 1px rgb(74, 74, 74)">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th style="width: 150px" class="text-center">Nama & NIP</th>
                                    <th>Pangkat - Gol. Ruang</th>
                                    <th>Jenis Pensiun</th>
                                    <th class="text-center" style="width: 120px">Telpon</th>
                                    <th class="text-center">Status</th>
                                    <th style="width: 130px" class="text-center">Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_pegawai as $pegawai)
                                    <tr>
                                        <th scope="row">
                                            {{ $list_pegawai->firstItem() + $loop->index }}.
                                        </th>
                                        <td>
                                            {!! $pegawai->kode_progress_badge !!} <br>
                                            {{ $pegawai->nip }} <br>
                                            @if ($pegawai->status_usul)
                                                <div class="alert alert-info p-2" role="alert">
                                                    {{ $pegawai->status_usul }}
                                                </div>
                                            @endif
                                            {{-- <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-warning dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Pilih Keterangan<i class="mdi mdi-chevron-down"></i>
                                                </a>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('pegawai.status-usul.update', [
                                                            'pegawai' => $pegawai->nip,
                                                            'keterangan' => 'Berkas Anda dalam tahap verifikasi',
                                                        ]) }}">
                                                        Berkas Anda dalam tahap verifikasi
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('pegawai.status-usul.update', [
                                                            'pegawai' => $pegawai->nip,
                                                            'keterangan' => 'Berkas Anda telah diusulkan',
                                                        ]) }}">
                                                        Berkas Anda telah diusulkan
                                                    </a>
                                                </div>
                                            </div> --}}
                                        </td>
                                        <td>{{ $pegawai->pangkat_golongan }} </td>
                                        <td>
                                            {{ $pegawai->jenisPensiun->nama }} <br>
                                            <div class="mt-2">
                                                <form action="{{ route('pegawai.kode_progress', ['pegawai' => $pegawai->nip]) }}" method="POST">
                                                @csrf
                                                <label for="progress_usul_{{ $pegawai->id }}" class="form-label">-- Pilih Progress Usul --</label>
                                            
                                                <select class="form-select" id="progress_usul_{{ $pegawai->id }}" name="kode_progress"
                                                        onchange="this.form.submit()">
                                                    <option value="">-- Pilih Progress --</option>
                                                    <option value="1" @selected($pegawai->kode_progress == 1)>Sudah Diterima</option>
                                                    <option value="2" @selected($pegawai->kode_progress == 2)>Sudah TTE</option>
                                                    <option value="3" @selected($pegawai->kode_progress == 3)>Input SIASN</option>
                                                    <option value="4" @selected($pegawai->kode_progress == 4)>Dokumen Tarik</option>
                                                    <option value="5" @selected($pegawai->kode_progress == 5)>Dokumen Masuk</option>
                                                    <option value="6" @selected($pegawai->kode_progress == 6)>Dokumen Batal</option>
                                                </select>
                                            </form>

                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ $pegawai->whatsapp_link }}" target="_blank">
                                                {{ $pegawai->telpon }}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="me-2">Identitas Pasangan :</span>
                                                <x-others.icon-check
                                                    check='{{ $pegawai->done_partner }}'></x-others.icon-check>
                                            </div>
                                            @if ($pegawai->mempunyai_anak)
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">Identitas Anak :</span>
                                                    <x-others.icon-check
                                                        check='{{ count($pegawai->listDetailAnak) == $pegawai->jumlah_anak }}'></x-others.icon-check>
                                                </div>
                                            @endif
                                            <div class="d-flex align-items-center">
                                                <span class="me-2">Upload Dokumen :</span>
                                                <x-others.icon-check
                                                    check='{{ $pegawai->done_document }}'></x-others.icon-check>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="me-2">Final Data :</span>
                                                <div class="dropdown mt-sm-0">
                                                    <a href="#"
                                                        class="btn btn-sm {{ $pegawai->data_done ? 'btn-success' : 'btn-danger' }} dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        {{ $pegawai->data_done ? 'Ya' : 'Tidak' }}
                                                        <i class="mdi mdi-chevron-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('pegawai.is_complete', ['pegawai' => $pegawai->nip]) }}">
                                                            {{ $pegawai->data_done ? 'Tidak' : 'Ya' }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <x-.forms.btn-group-action
                                                urledit="{{ route('pegawai.show', ['pegawai' => $pegawai->nip]) }}"
                                                urldelete="{{ route('pegawai.destroy', ['pegawai' => $pegawai->nip]) }}"
                                                text="Lihat">
                                            </x-.forms.btn-group-action>
                                            <a href="{{ route('pegawai.keterangan', ['pegawai' => $pegawai->nip]) }}"
                                                class="btn btn-sm btn-secondary mt-2">Keterangan</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $list_pegawai->links('layouts.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection