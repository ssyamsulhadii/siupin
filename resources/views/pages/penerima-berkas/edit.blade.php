@extends('layouts.app')
@section('content')
    <x-others.page-title title="Penerima Berkas" subtitle="Tambah Data"
        link="{{ route('penerima-berkas.index') }}"></x-others.page-title>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-footer bg-soft-primary">
                    <h3 class="card-title" style="font-size: 18px">Form Penerima Berkas</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('penerima-berkas.update', ['penerima_berka' => $penerima_berkas->id]) }}"
                        method="POST">
                        @csrf @method('PATCH')
                        @include('pages.penerima-berkas.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
