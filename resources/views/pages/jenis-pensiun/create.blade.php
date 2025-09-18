@extends('layouts.app')
@section('content')
    <x-others.page-title title="Jenis Pensiun" subtitle="Tambah Data"
        link="{{ route('jenis-pensiun.index') }}"></x-others.page-title>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-footer bg-soft-primary">
                    <h3 class="card-title" style="font-size: 18px">Form Jenis Pensiun</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('jenis-pensiun.store') }}" method="POST">
                        @csrf
                        @include('pages.jenis-pensiun.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
