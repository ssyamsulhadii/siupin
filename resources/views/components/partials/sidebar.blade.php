<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li class="">
                    <a href="{{ route('beranda.index') }}" class="waves-effect">
                        <i class="ri-home-8-line"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profil-aplikasi') }}" class="waves-effect">
                        <i class="ri-article-line"></i>
                        <span>Profil Aplikasi</span>
                    </a>
                </li>
                @auth
                    <li>
                        <a href="{{ route('jenis-pensiun.index') }}"
                            class="waves-effect
                        {{ Route::is('jenis-pensiun*') ? 'mm-active' : '' }}">
                            <i class="ri-layout-4-line"></i>
                            <span>Jenis Pensiun</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('jabatan-nominatif.index') }}"
                            class="waves-effect
                        {{ Route::is('jabatan-nominatif*') ? 'mm-active' : '' }}">
                            <i class=" ri-bookmark-2-line"></i>
                            <span>Jabatan Nominatif</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pegawai.index') }}" class="waves-effect">
                            <i class=" ri-contacts-book-line"></i>
                            <span>Pegawai</span>
                        </a>
                    </li>
                @endauth
                <li class="{{ request()->is('usul-pensiun*') ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-send-plane-2-line"></i>
                        <span>Usul Pensiun</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('identitas-diri.form') }}"
                                class="{{ Route::is('identitas-diri.form') ? 'active' : '' }}">
                                Input Identitas Diri</a>
                        </li>
                        <li><a href="#" class="{{ Route::is('identitas-pasangan.form') ? 'active' : '' }}">
                                Input Identitas Pasangan</a></li>
                        <li><a href="#" class="{{ Route::is('identitas-anak.form') ? 'active' : '' }}">
                                Input Identitas Anak</a></li>
                        <li><a href="#" class="{{ Route::is('upload-dokumen.form') ? 'active' : '' }}">
                                Upload Dokumen</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('inbox-usul.view') }}" class="waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Inbox Usul</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('buku-petunjuk') }}" class="waves-effect">
                        <i class=" ri-book-2-line"></i>
                        <span>Buku Petunjuk</span>
                    </a>
                </li>
                @auth
                    <li>
                        <a href="{{ route('penerima-berkas.index') }}"
                            class="waves-effect
                        {{ Route::is('penerima-berkas*') ? 'mm-active' : '' }}">
                            <i class=" ri-repeat-line"></i>
                            <span>Penerima Berkas</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
                            <i class="ri-logout-box-line"></i>
                            <span>Keluar</span>
                        </a>
                        <form action="{{ route('logout') }}" class="d-none" id="form-logout" method="POST">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
