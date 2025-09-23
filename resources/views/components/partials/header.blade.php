<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm text-center" style="margin-left: -15px">
                        <img src="{{ asset('assets/images/logo-siupin.png') }}" alt="logo-sm-light" height="55">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-siupin-text.png') }}" alt="logo-light" height="55">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>
        </div>

        @guest
            <a href="{{ route('login') }}" class="btn btn-sm btn-success text-dark" style="margin-right: 13px">Masuk</a>
        @endguest
        @auth
            <div class="d-flex">
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ri-notification-3-line"></i>
                        <span class="badge rounded-pill bg-danger float-end">{{ $glob_jumlah_usul_masuk }}</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center bg-warning p-2 rounded">
                                <h6 class="m-0">Data Usul Masuk 1 Bulan Terakhir</h6>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            @foreach ($glob_5_pegawai as $pegawai)
                                <a href="{{ route('pegawai.show', ['pegawai' => $pegawai->nip]) }}"
                                    class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                                <i class="ri-inbox-archive-line"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6>{{ "$pegawai->nama" }} <br> {{ $pegawai->nip }}</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">{{ $pegawai->jenisPensiun->nama }}</p>
                                                <p class="mb-0"><i class="mdi mdi-calendar-check"></i>
                                                    {{ $pegawai->tanggal_usul->isoFormat('DD MMMM YYYY') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach


                            {{-- <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title bg-warning rounded-circle font-size-16">
                                            <i class=" ri-inbox-archive-line"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">Nama | NIP</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">Jenis Usulan</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title bg-warning rounded-circle font-size-16">
                                            <i class=" ri-inbox-archive-line"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">Nama | NIP</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">Jenis Usulan</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a> --}}
                        </div>
                        <div class="p-2 border-top">
                            <div class="d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center" href="{{ route('pegawai.index') }}">
                                    <i class="mdi mdi-arrow-right-circle me-1"></i> Lihat semua usulan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/account.png') }}"
                            alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1">Admin P3I</span>
                    </button>
                </div>
            </div>
        @endauth

    </div>
</header>
