@extends('layouts.app')
@section('content')
    <x-others.page-title title="Penerimas Berkas" subtitle="Tampil Data"
        link="{{ route('penerima-berkas.index') }}"></x-others.page-title>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-1">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-sm-2">
                            <a href="{{ route('penerima-berkas.create') }}"
                                class="btn btn-primary waves-effect waves-light">Tambah</a>
                        </div>
                        <div class="col-sm-3">
                            <form action="{{ route('penerima-berkas.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nama Penerima/Pengusul"
                                        name="nama" value="{{ request('nama') }}">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered" style="border: 1px rgb(74, 74, 74)">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Telpon</th>
                                            <th>Tanggal Pengambilan</th>
                                            <th>Keterangan</th>
                                            <th>Berkas Usul</th>
                                            <th class="text-center">Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_penerima_berkas as $penerima_berkas)
                                            <tr>
                                                <td>
                                                    {{ $list_penerima_berkas->firstItem() + $loop->index }}
                                                </td>
                                                <td>{{ $penerima_berkas->nama }}</td>
                                                <td>
                                                    <a href="{{ $penerima_berkas->whatsapp_link }}" target="_blank">
                                                        {{ $penerima_berkas->telpon }}
                                                    </a>
                                                </td>
                                                <td>{{ $penerima_berkas->tanggal_pengambilan->isoFormat('DD MMMM YYYY') }}
                                                </td>
                                                <td>{{ $penerima_berkas->keterangan }}</td>
                                                <td>{{ $penerima_berkas->pegawai->nama }}</td>
                                                <td class="text-center">
                                                    <x-.forms.btn-group-action
                                                        urledit="{{ route('penerima-berkas.edit', ['penerima_berka' => $penerima_berkas->id]) }}"
                                                        urldelete="{{ route('penerima-berkas.destroy', ['penerima_berka' => $penerima_berkas->id]) }}">
                                                    </x-.forms.btn-group-action>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $list_penerima_berkas->links('layouts.pagination') }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
