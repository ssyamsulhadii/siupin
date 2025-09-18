@extends('layouts.app')
@section('content')
    <x-others.page-title title="Profil Aplikasi" subtitle="Tampil Data"
        link="{{ route('profil-aplikasi') }}"></x-others.page-title>

    <div class="row d-flex align-items-center">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-body">
                    <h4 class="card-title">Tentang Aplikasi</h4>
                    <div class="text-center my-3">
                        <img src="{{ asset('assets/images/logo-kabkapuas.png') }}" height="130px">
                        <img src="{{ asset('assets/images/logo-siupin.png') }}" height="150px">
                    </div>
                    <p class="card-text" style="text-align: justify">
                        <b>SIUPIN</b> (Sistem Informasi Usul Pensiun) adalah sebuah aplikasi layanan kepegawaian yang
                        dirancang untuk mempermudah proses pengusulan pensiun pegawai negeri. Melalui sistem ini,
                        pegawai dapat melakukan pengecekan data, mengajukan usulan pensiun, serta memantau status
                        pengajuan secara cepat, transparan, dan terintegrasi. SIUPIN hadir untuk meningkatkan
                        efisiensi, mengurangi proses manual, serta memberikan kepastian informasi bagi pegawai
                        menjelang masa purna tugas.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-body">
                    <h4 class="card-title">Mewujudkan Kapuas BERSINAR</h4>
                    <div>
                        <div class="text-center my-3">
                            <img src="{{ asset('assets/images/kapuas-bersinar.png') }}" height="150px">
                        </div>
                        <div>
                            <p style="text-align: justify">
                                <strong>SIUPIN (Sistem Informasi Usul Pensiun)</strong> merupakan inovasi layanan digital
                                yang mendukung visi Kabupaten Kapuas yang
                                <em>BERdaya saing, Sejahtera, INdah, Aman, dan Religius</em>.
                            </p>
                            <ul style="text-align: justify">
                                <li><strong>BERdaya saing</strong> &rarr; meningkatkan kualitas layanan kepegawaian melalui
                                    teknologi modern yang cepat dan efisien.</li>
                                <li><strong>Sejahtera</strong> &rarr; memberi ketenangan serta kepastian bagi pegawai
                                    menjelang purna tugas melalui proses yang jelas dan transparan.</li>
                                <li><strong>INdah</strong> &rarr; antarmuka aplikasi yang ramah pengguna mencerminkan
                                    pelayanan publik yang tertata dan nyaman.</li>
                                <li><strong>Aman</strong> &rarr; menjamin keamanan data pegawai dengan sistem yang akuntabel
                                    dan terpercaya.</li>
                                <li><strong>Religius</strong> &rarr; menghadirkan layanan tulus sebagai wujud penghormatan
                                    bagi pegawai yang telah mengabdi.</li>
                            </ul>
                            <p style="text-align: justify">
                                Dengan semangat tersebut, SIUPIN hadir sebagai sarana untuk mewujudkan tata kelola
                                pemerintahan yang profesional, humanis, dan sesuai dengan nilai luhur Kabupaten Kapuas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-body">
                    <h4 class="card-title">Core Value BerAKHLAK</h4>
                    <div>
                        <div class="text-center my-3">
                            <img src="{{ asset('assets/images/Logo-BerAKHLAK.png') }}" width="280px">
                        </div>
                        <p style="text-align: justify">
                            <strong>SIUPIN (Sistem Informasi Usul Pensiun)</strong> adalah inovasi layanan kepegawaian yang
                            mempermudah pegawai dalam proses pengusulan pensiun.
                            Aplikasi ini dibangun sejalan dengan core value ASN <em>BerAKHLAK</em>:
                        </p>
                        <ul style="text-align: justify">
                            <li><strong>Berorientasi Pelayanan</strong> &rarr; memberikan kemudahan akses, transparansi, dan
                                kepastian informasi bagi pegawai menjelang purna tugas.</li>
                            <li><strong>Akuntabel</strong> &rarr; data usulan pensiun tercatat secara sistematis dan dapat
                                dipertanggungjawabkan.</li>
                            <li><strong>Kompeten</strong> &rarr; sistem dirancang dengan profesionalisme untuk mendukung
                                kelancaran administrasi pensiun.</li>
                            <li><strong>Harmonis</strong> &rarr; mendorong kerja sama antar unit agar pelayanan lebih
                                efektif.</li>
                            <li><strong>Loyal</strong> &rarr; mendukung kebijakan pemerintah dalam meningkatkan kualitas
                                layanan kepegawaian.</li>
                            <li><strong>Adaptif</strong> &rarr; menggunakan teknologi digital untuk menyesuaikan dengan
                                kebutuhan zaman.</li>
                            <li><strong>Kolaboratif</strong> &rarr; membangun sinergi antara pegawai, unit kerja, dan
                                instansi terkait.</li>
                        </ul>
                        <p style="text-align: justify">
                            Dengan berlandaskan nilai-nilai <em>BerAKHLAK</em>, SIUPIN hadir sebagai wujud nyata
                            transformasi layanan pensiun yang modern, terpercaya, dan humanis.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
