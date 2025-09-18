@extends('layouts.app')
@section('content')
    <x-others.page-title title="Jabatan Nominatif" subtitle="Tambah Data"
        link="{{ route('jabatan-nominatif.index') }}"></x-others.page-title>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-footer bg-soft-primary">
                    <h3 class="card-title" style="font-size: 18px">Form Jabatan Nominatif</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('jabatan-nominatif.store') }}" method="POST">
                        @csrf
                        @include('pages.jabatan-nominatif.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
