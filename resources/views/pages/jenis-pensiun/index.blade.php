@extends('layouts.app')
@section('content')
    <x-others.page-title title="Jenis Pensiun" subtitle="Tampil Data"
        link="{{ route('jenis-pensiun.index') }}"></x-others.page-title>
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-body">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-sm-2">
                            <a href="{{ route('jenis-pensiun.create') }}"
                                class="btn btn-primary waves-effect waves-light">Tambah</a>
                        </div>
                    </div>
                    <div class="row col-lg-6">
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered" style="border: 1px rgb(74, 74, 74)">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th class="text-center">Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_jenis_pensiun as $jenis_pensiun)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $jenis_pensiun->nama }}</td>
                                            <td>{{ $jenis_pensiun->keterangan }}</td>
                                            <td>
                                                <x-.forms.btn-group-action
                                                    urledit="{{ route('jenis-pensiun.edit', ['jenis_pensiun' => $jenis_pensiun->id]) }}"
                                                    urldelete="{{ route('jenis-pensiun.destroy', ['jenis_pensiun' => $jenis_pensiun->id]) }}">
                                                </x-.forms.btn-group-action>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
