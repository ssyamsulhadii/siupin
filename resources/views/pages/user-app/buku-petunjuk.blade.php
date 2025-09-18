@extends('layouts.app')
@section('content')
    <x-others.page-title title="Buku Petunjuk" subtitle="Tampil Data"
        link="{{ route('beranda.index') }}"></x-others.page-title>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body text-center">
                <h3 class="mt-4">UNDUH DOKUMEN SIUPIN</h3>
                <p class="card-text">Klik ikon di bawah untuk mengunduh dokumen</p>
                <a href="{{ asset('assets/dokumen/buku-petunjuk.pdf') }}" target="blank" class="text-primary"
                    style="font-size: 70px">
                    <i class="ri-download-2-fill"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
