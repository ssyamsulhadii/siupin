@extends('layouts.app')
@section('content')
    <x-others.page-title title="Usul Pensiun" subtitle="Identitas Pasangan"
        link="{{ route('identitas-diri.form') }}"></x-others.page-title>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-footer bg-soft-primary">
                    <h3 class="card-title" style="font-size: 18px">Form Identitas Pasangan</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('identitas-pasangan.form', ['pegawai' => $pegawai->nip]) }}" method="POST">
                        @csrf
                        @include('pages.usul-pensiun.identitas-pasangan-form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
