@extends('layouts.app')
@section('content')
    <x-others.page-title title="Dasar Pengsulan" subtitle="Tampil Data"
        link="{{ route('beranda.index') }}"></x-others.page-title>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body text-center">
                <h3 class="my-4 ">Dasar Pengusulan Pensiun - Edaran Bupati</h3>
                <img src="{{ asset('assets/dokumen/EDARAN BUPATI KAPUAS SIUPIN.jpg') }}"
                    class="img-fluid img-thumbnail mx-auto d-block">
            </div>
        </div>
    </div>
@endsection
