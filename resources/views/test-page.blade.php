@extends('layouts.app')
@section('content')
    <x-others.page-title title="Pegawai" subtitle="Tampil Data" link="{{ route('pegawai.index') }}"></x-others.page-title>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-footer">
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
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-info waves-effect waves-light">Cetak</button>
                            <button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button>
                        </div>
                        <div class="col-sm-3">
                            <form action="https://sispd.dpmptsp.kapuaskab.go.id/pegawai" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Ketikkan Nama Pegawai"
                                        name="nama" value="">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-light">Cari</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered" style="border: 1px rgb(74, 74, 74)">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama & NIP</th>
                                    <th>Jenis Pensiun</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Telpon</th>
                                    <th>Pangkat / Gol. Ruang</th>
                                    {{-- <th>Unit Organisasi</th>
                                    <th>Jabatan</th> --}}
                                    <th>Alamat</th>
                                    <th>Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Edit | Lihat | Hapus</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
