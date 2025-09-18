@extends('layouts.app')
@section('content')
    <x-others.page-title title="Usul Pensiun" subtitle="Identitas Diri"
        link="{{ route('identitas-diri.form') }}"></x-others.page-title>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-footer bg-soft-primary">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="card-title" style="font-size: 18px">Form Identitas Diri</h3>
                        </div>
                        <div class="col-lg-6">
                            <form action="{{ route('identitas-diri.form') }}" method="GET">
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Ketikkan NIP" name="nip"
                                        value="{{ request('nip') }}">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-secondary">Cari</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('identitas-diri.form') }}" method="POST">
                        @csrf
                        @include('pages.usul-pensiun.identitas-diri-form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@if (request('nip') && is_null($pegawai))
    @push('script')
        <script>
            Swal.fire({
                title: "Perhatian",
                html: "Data tidak ditemukan",
                icon: 'warning',
                showCancelButton: false,
                showConfirmButton: false,
                timer: 2500,
            })
        </script>
    @endpush
@endif
