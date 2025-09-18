@extends('layouts.app')
@section('content')
    <x-others.page-title title="Jabatan Nominatif" subtitle="Tampil Data"
        link="{{ route('jabatan-nominatif.index') }}"></x-others.page-title>
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-body">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-sm-2">
                            <a href="{{ route('jabatan-nominatif.create') }}"
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
                                        <th>BUP</th>
                                        <th class="text-center">Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_jabatan_nominatif as $jabatan_nominatif)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $jabatan_nominatif->nama }}</td>
                                            <td>{{ $jabatan_nominatif->bup }}</td>
                                            <td>
                                                <x-.forms.btn-group-action
                                                    urledit="{{ route('jabatan-nominatif.edit', ['jabatan_nominatif' => $jabatan_nominatif->id]) }}"
                                                    urldelete="{{ route('jabatan-nominatif.destroy', ['jabatan_nominatif' => $jabatan_nominatif->id]) }}">
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
