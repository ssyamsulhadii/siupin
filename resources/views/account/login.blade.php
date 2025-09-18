@extends('layouts.master')
@section('main-master')
    {{-- <div class="bg-overlay"></div> --}}
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <div class="">
                            <a href="index.html" class="auth-logo">
                                <img src="{{ asset('assets/images/logo-siupin.png') }}" height="170px"
                                    class="logo-light mx-auto" alt="">
                            </a>
                        </div>
                    </div>

                    <h4 class="text-warning text-center font-size-20"><b>SIUPIN</b></h4>
                    <div class="text-center fw-bold">SISTEM INFORMASI USUL PENSIUN</div>
                    <div class="p-3">
                        <form class="form-horizontal mt-3" action="{{ route('authenticate') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control @error('username') is-invalid @enderror" type="text"
                                        placeholder="Username" name="username" value="{{ old('username') }}">
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                        placeholder="Password" name="password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 waves-effect waves-light"
                                        type="submit">Masuk</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
@endsection
