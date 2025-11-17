@extends('layouts.app')
@section('content')
    <x-others.page-title title="Pegawai" subtitle="Detail Pegawai" link="{{ route('pegawai.index') }}"></x-others.page-title>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#identitasDiri" role="tab"
                                aria-selected="true">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Identitas Diri</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#identitasPasangan" role="tab"
                                aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Identitas Pasangan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#identitasAnak" role="tab"
                                aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">Identitas Anak</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#dokumenUpload" role="tab"
                                aria-selected="false">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">Dokumen Upload</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="identitasDiri" role="tabpanel">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <x-others.label-field label="Jenis Pensiun" value="{{ $pegawai->jenisPensiun->nama }}">
                                    </x-others.label-field>
                                    <x-others.label-field label="Nama Lengkap" value="{{ $pegawai->nama }}">
                                    </x-others.label-field>
                                    <x-others.label-field label="Nomor Induk Pegawai (NIP)" value="{{ $pegawai->nip }}">
                                    </x-others.label-field>
                                    <x-others.label-field label="Nomor Kartu Penduduk (NIK)" value="{{ $pegawai->nik }}">
                                    </x-others.label-field>
                                    <x-others.label-field label="Nomor Kartu Keluarga (NKK)" value="{{ $pegawai->nkk }}">
                                    </x-others.label-field>
                                    <x-others.label-field label="Jenis Kelamin"
                                        value="{{ $pegawai->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}">
                                    </x-others.label-field>
                                </div>
                                <div class="col-md-4">
                                    <x-others.label-field label="Tanggal Lahir"
                                        value="{{ $pegawai->tanggal_lahir->isoFormat('DD-MMMM-YYYY') }}">
                                    </x-others.label-field>

                                    @if ($pegawai->tanggal_usul)
                                        <x-others.label-field label="Tanggal Usul"
                                            value="{{ $pegawai->tanggal_usul->isoFormat('DD-MMMM-YYYY') }}">
                                        </x-others.label-field>
                                        <x-others.label-field label="Tanggal TMT Pensiun"
                                            value="{{ $pegawai->tanggal_tmt_pensiun->isoFormat('DD-MMMM-YYYY') }}">
                                        </x-others.label-field>
                                    @endif                                    

                                    <x-others.label-field label="Nomor Telpon" value="{{ $pegawai->telpon }}">
                                    </x-others.label-field>
                                    <x-others.label-field label="Alamat Sekarang" value="{{ $pegawai->alamat_sekarang }}">
                                    </x-others.label-field>
                                </div>

                                <div class="col-sm-4">
                                    <x-others.label-field label="Unit Organisasi" value="{{ $pegawai->unit_organisasi }}">
                                    </x-others.label-field>
                                    <x-others.label-field label="Jabatan Nominatif"
                                        value="{{ $pegawai->jabatanNominatif->nama }}">
                                    </x-others.label-field>
                                    <x-others.label-field label="Jabatan" value="{{ $pegawai->jabatan }}">
                                    </x-others.label-field>
                                    <x-others.label-field label="Pangkat Golongan"
                                        value="{{ $pegawai->pangkat_golongan }}">
                                    </x-others.label-field>
                                    <x-others.label-field label="Alamat Pensiun" value="{{ $pegawai->alamat_pensiun }}">
                                    </x-others.label-field>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="identitasPasangan" role="tabpanel">

                            @if ($pegawai->mempunyai_pasangan != 'tidak')
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <x-others.label-field label="Mempunyai Pasangan"
                                            value="{{ $pegawai->mempunyai_pasangan }}">
                                        </x-others.label-field>
                                        <x-others.label-field label="Nama" value="{{ $pegawai->nama_pasangan }}">
                                        </x-others.label-field>
                                        <x-others.label-field label="Tanggal Lahir"
                                            value="{{ $pegawai->tanggal_lahir_pasangan->isoFormat('DD-MMMM-YYYY') }}">
                                        </x-others.label-field>
                                    </div>
                                    <div class="col-sm-3">
                                        <x-others.label-field label="Status" value="{{ $pegawai->status_pasangan }}">
                                        </x-others.label-field>
                                        <x-others.label-field label="Nomor Induk Kependudukan (NIK)"
                                            value="{{ $pegawai->nik_pasangan }}">
                                        </x-others.label-field>
                                        <x-others.label-field label="Pekerjaan"
                                            value="{{ $pegawai->pekerjaan_pasangan }}">
                                        </x-others.label-field>
                                    </div>
                                    <div class="col-sm-3">
                                        <x-others.label-field label="No Akta Menikah"
                                            value="{{ $pegawai->no_akta_nikah }}">
                                        </x-others.label-field>
                                        <x-others.label-field label="Mempunyai Anak"
                                            value="{{ $pegawai->mempunyai_anak ? 'Ya' : 'Tidak' }}">
                                        </x-others.label-field>
                                        <x-others.label-field label="Tanggal Bercerai"
                                            value="{{ $pegawai->tanggal_bercerai?->isoFormat('DD-MMMM-YYYY') }}">
                                        </x-others.label-field>
                                    </div>
                                    <div class="col-sm-3">
                                        <x-others.label-field label="Tanggal Menikah"
                                            value="{{ $pegawai->tanggal_menikah?->isoFormat('DD-MMMM-YYYY') }}">
                                        </x-others.label-field>
                                        <x-others.label-field label="Jumlah Anak" value="{{ $pegawai->jumlah_anak }}">
                                        </x-others.label-field>
                                        <x-others.label-field label="Tanggal Meninggal"
                                            value="{{ $pegawai->tanggal_meninggal_pasangan?->isoFormat('DD-MMMM-YYYY') }}">
                                        </x-others.label-field>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="tab-pane" id="identitasAnak" role="tabpanel">
                            @if (count($pegawai->listDetailAnak) == $pegawai->jumlah_anak)
                                {{-- <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <h5 class="text-center">== IDENTITAS ANAK ==</h5>
                                        <hr class="mb-0">
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered"
                                                        style="border: 1px rgb(74, 74, 74)">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>NIK</th>
                                                                <th>Nama</th>
                                                                <th>Tanggal Lahir</th>
                                                                <th>Jenis Kelamin</th>
                                                                <th>Menikah</th>
                                                                <th>Telpon</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($pegawai->listDetailAnak as $detail_anak)
                                                                <tr>
                                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                                    <td>{{ $detail_anak->nik }}</td>
                                                                    <td>{{ $detail_anak->nama }}</td>
                                                                    <td>{{ $detail_anak->tanggal_lahir->isoFormat('DD-MMMM-YYYY') }}
                                                                    </td>
                                                                    <td>{{ $detail_anak->ket_jenis_kelamin }}</td>
                                                                    <td>{{ $detail_anak->ket_menikah }}</td>
                                                                    <td>{{ $detail_anak->telpon }}</td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="8" class="text-center">Data Identitas
                                                                        Anak
                                                                        Belum Ada.</td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane" id="dokumenUpload" role="tabpanel">
                            @if ($pegawai->data_done)
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <x-others.label-field label="Surat Pengantar Pimpinan">
                                            <x-others.alert-view-dokumen
                                                dokumen="{{ $pegawai->surat_pengantar_pimpinan }}"
                                                url="{{ $pegawai->path_surat_pengantar_pimpinan }}">
                                            </x-others.alert-view-dokumen>
                                        </x-others.label-field>
                                        <x-others.label-field label="Surat Pernyataan Pemohon">
                                            <x-others.alert-view-dokumen
                                                dokumen="{{ $pegawai->surat_pernyataan_pemohon }}"
                                                url="{{ $pegawai->path_surat_pernyataan_pemohon }}">
                                            </x-others.alert-view-dokumen>
                                        </x-others.label-field>
                                        <x-others.label-field label="Surat Pernyataan Disiplin">
                                            <x-others.alert-view-dokumen
                                                dokumen="{{ $pegawai->surat_pernyataan_disiplin }}"
                                                url="{{ $pegawai->path_surat_pernyataan_disiplin }}">
                                            </x-others.alert-view-dokumen>
                                        </x-others.label-field>
                                        <x-others.label-field label="Surat Pernyataan Pidana">
                                            <x-others.alert-view-dokumen dokumen="{{ $pegawai->surat_pernyataan_pidana }}"
                                                url="{{ $pegawai->path_surat_pernyataan_pidana }}">
                                            </x-others.alert-view-dokumen>
                                        </x-others.label-field>
                                    </div>
                                    <div class="col-sm-3">
                                        <x-others.label-field label="SK CPNS">
                                            <x-others.alert-view-dokumen dokumen="{{ $pegawai->sk_cpns }}"
                                                url="{{ $pegawai->path_sk_cpns }}">
                                            </x-others.alert-view-dokumen>
                                        </x-others.label-field>
                                        <x-others.label-field label="SK PNS">
                                            <x-others.alert-view-dokumen dokumen="{{ $pegawai->sk_pns }}"
                                                url="{{ $pegawai->path_sk_pns }}">
                                            </x-others.alert-view-dokumen>
                                        </x-others.label-field>
                                        <x-others.label-field label="SK Pangkat Terakhir">
                                            <x-others.alert-view-dokumen dokumen="{{ $pegawai->sk_pangkat_terakhir }}"
                                                url="{{ $pegawai->path_sk_pangkat_terakhir }}">
                                            </x-others.alert-view-dokumen>
                                        </x-others.label-field>
                                        <x-others.label-field label="SKP Pegawai">
                                            <x-others.alert-view-dokumen dokumen="{{ $pegawai->skp_pegawai }}"
                                                url="{{ $pegawai->path_skp_pegawai }}">
                                            </x-others.alert-view-dokumen>
                                        </x-others.label-field>
                                    </div>

                                    <div class="col-sm-3">
                                        <x-others.label-field label="Foto KTP">
                                            <x-others.alert-view-dokumen dokumen="{{ $pegawai->foto_ktp }}"
                                                url="{{ $pegawai->path_foto_ktp }}">
                                            </x-others.alert-view-dokumen>
                                        </x-others.label-field>
                                        <x-others.label-field label="Foto KK">
                                            <x-others.alert-view-dokumen dokumen="{{ $pegawai->foto_kk }}"
                                                url="{{ $pegawai->path_foto_kk }}">
                                            </x-others.alert-view-dokumen>
                                        </x-others.label-field>
                                        <x-others.label-field label="Pas Foto">
                                            <x-others.alert-view-dokumen dokumen="{{ $pegawai->pas_foto }}"
                                                url="{{ $pegawai->path_pas_foto }}">
                                            </x-others.alert-view-dokumen>
                                        </x-others.label-field>
                                        @if ($pegawai->akta_menikah)
                                            <x-others.label-field label="Akta Nikah">
                                                <x-others.alert-view-dokumen dokumen="{{ $pegawai->akta_menikah }}"
                                                    url="{{ $pegawai->path_akta_menikah }}">
                                                </x-others.alert-view-dokumen>
                                            </x-others.label-field>
                                        @endif
                                    </div>
                                    <div class="col-sm-3">
                                        @if ($pegawai->surat_janda_duda)
                                            <x-others.label-field label="Surat Janda/Duda">
                                                <x-others.alert-view-dokumen dokumen="{{ $pegawai->surat_janda_duda }}"
                                                    url="{{ $pegawai->path_surat_janda_duda }}">
                                                </x-others.alert-view-dokumen>
                                            </x-others.label-field>
                                        @endif
                                        @if ($pegawai->surat_kematian_pasangan)
                                            <x-others.label-field label="Surat Kematian Pasangan">
                                                <x-others.alert-view-dokumen
                                                    dokumen="{{ $pegawai->surat_kematian_pasangan }}"
                                                    url="{{ $pegawai->path_surat_kematian_pasangan }}">
                                                </x-others.alert-view-dokumen>
                                            </x-others.label-field>
                                        @endif
                                        @if ($pegawai->surat_pmk)
                                            <x-others.label-field label="Surat PMK">
                                                <x-others.alert-view-dokumen dokumen="{{ $pegawai->surat_pmk }}"
                                                    url="{{ $pegawai->path_surat_pmk }}">
                                                </x-others.alert-view-dokumen>
                                            </x-others.label-field>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
