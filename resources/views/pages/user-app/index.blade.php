@extends('layouts.app')
@section('content')
    <x-others.page-title title="Beranda" subtitle="Tampil Data" link="{{ route('beranda.index') }}"></x-others.page-title>
    @auth
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="text-truncate font-size-14 mb-2 fw-bold">Jumlah Usulan</div>
                            <h4 class="mb-2">{{ $pegawai_count }}</h4>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class="ri-send-plane-2-line fs-2"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div>
        @foreach ($list_jenis_pensiun as $jenis_pensiun)
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div class="text-truncate font-size-14 mb-2 fw-bold">
                                    {{ $jenis_pensiun->nama }}</div>
                                <h4 class="mb-2">{{ $jenis_pensiun->pegawai_count }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-send-plane-2-line fs-2"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div>
        @endforeach
    </div>
    @endauth


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
            <div class="card">
                <div class="card-header">
                    Qoute
                </div>
                <div class="card-body">
                    <blockquote class="card-blockquote mb-0">
                        <p style="text-align: justify; font-size: 17px; font-weight: bold; font-style: italic">
                            Tetaplah menjadi baik, jika beruntung kita akan menemukan orang baik, jika tidak kita akan
                            ditemukan oleh orang baik.</p>
                        <footer class="blockquote-footer font-size-12 m-0">Anonim</footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card card-body">
                <h4 class="card-title">Persyaratan Usul Pensiun</h4>
                <div class="mb-0">
                    Penentuan klasifikasi jenis pensiun untuk PNS diatur dalam regulasi kepegawaian, salah satunya merujuk
                    ke :
                    <ul>
                        <li>Peraturan Pemerintah No. 11 Tahun 2017 tentang Manajemen PNS</li>
                        <li>Peraturan Pemerintah No. 35 Tahun 2019</li>
                        <li>Peraturan BKN No. 2 Tahun 2018 terkait tata cara teknis</li>
                        <li>Surat Edaran Bupati Kabupaten Kapuas Nomor <strong>800/122/P3I/BKPSDM/2025</strong> tentang
                            Penyampaian Usulan
                            Pensiun PNS Dilingkungan Pemerintah Kabupaten Kapuas</li>
                    </ul>
                </div>
                <p class="card-text" style="text-align: justify">
                    Dalam rangka pengajuan usul pensiun bagi Pegawai Negeri Sipil (PNS), terdapat sejumlah persyaratan
                    administratif yang harus dipenuhi sesuai dengan ketentuan peraturan perundang-undangan yang berlaku dan
                    menyesuaikan kebutuhan isntansi.
                    Persyaratan tersebut disusun untuk memastikan proses pensiun berjalan tertib, terstruktur, dan sesuai
                    dengan hak
                    serta kewajiban pegawai.
                </p>
                <p>Adapun persyaratan yang diperlukan dalam usul pensiun antara lain :</p>
                <ol>
                    <li> <strong>Surat Pengantar</strong> dari Kepala Dinas / Instansi / Unit Kerja masing-masing.</li>
                    <li> <strong>Surat Permohonan Pensiun</strong> (format dapat diunduh dibagian bawah halaman).</li>
                    <li> <strong>Surat Pernyataan</strong> tidak pernah dijatuhi hukuman <strong>disiplin</strong> tingkat
                        sedang/berat (format terlampir).
                    </li>
                    <li> <strong>Surat Pernyataan</strong> sedang/menjalani proses <strong>pidana atau dipidana </strong>
                        penjara berdasarkan putusan
                        pengadilan yang telah berkekuatan hukum tetap (format terlampir).</li>
                    <li> Salinan / fotokopi sah <strong>Surat Keputusan CPNS</strong> dilegalisir.</li>
                    <li> Salinan / fotokopi sah <strong>Surat Keputusan PNS</strong> dilegalisir.</li>
                    <li> Salinan / fotokopi sah <strong>Surat Keputusan Kenaikan Pangkat terakhir</strong> dilegalisir.</li>
                    <li> Salinan / fotokopi sah <strong>Surat Peninjauan Masa Kerja (PMK)</strong> dilegalisir.</li>
                    <li> <strong>Surat Keterangan Kematian suami / istri</strong> dari pejabat berwenang.</li>
                    <li> <strong>Surat Keterangan Kejandaan / Kedudaan</strong> dari Kelurahan / Kepala Desa (usul pensiun
                        janda/duda).</li>
                    <li> Salinan / fotokopi sah <strong>Surat Nikah/Akta Perkawinan / Akta Cerai</strong> dilegalisir oleh
                        Pejabat yang
                        berwenang.</li>
                    <li> Salinan / fotokopi sah <strong>Akta Kelahiran Anak</strong> dilegalisir oleh yang berwenang.</li>
                    <li> Sasaran Kinerja Pegawai <strong>(SKP) 1 (satu) Tahun Terakhir</strong>.</li>
                    <li> Fotokopi <strong>Kartu Keluarga (KK)</strong>.</li>
                    <li> Fotokopi <strong>Kartu Tanda Penduduk (KTP)</strong> (Jika mempunyai pasangan lampirkan KTP
                        Pasangan).</li>
                    <li> <strong>Pasfoto formal</strong> berwarna dengan latar bebas.</li>
                </ol>
                <div class="card bg-warning">
                    <div class="card-body pb-0">
                        <strong>Catatan : </strong>
                        <p class="text-dark">Untuk persyaratan <strong>no 9 s/d 12</strong> adalah opsional, tapi wajib
                            diunggah jika ybs mempunyai dokumen tersebut.</p>

                        <p class="text-dark">Berkas usul pensiun yang tidak dilengkapi
                            setelah diinput dalam seminggu kerja akan dihapus oleh admin.</p>

                        <p class="text-dark" style="text-align: justify">
                            Seluruh dokumen harus diupload secara lengkap, jelas, dan sah (dilegalisir apabila diperlukan)
                            untuk
                            memperlancar proses verifikasi oleh pejabat berwenang sehingga usul pensiun dapat diproses dan
                            ditetapkan sesuai ketentuan, selain dari pas foto dokumen persyaratan <strong> berbentuk
                                pdf dengan ukuran maksimal 700 kb.</strong>

                        </p>
                    </div>
                </div>
                <div>
                    Unduh foprmat surat permohonan usul pensiun
                    <ul>
                                                <li><a target="blank" href="{{ asset('assets/dokumen/surat-permohonan-usul-penisun.docx') }}">Surat
                                Permohonan Usul Penisun.docx</a>
                        </li>
                        <li><a target="blank"
                                href="{{ asset('assets/dokumen/surat-pernyataan-tidak-sedang-menjalani-proses-pidana.docx') }}">Surat
                                Pernyataan Tidak Sedang Menjalani Proses Pidana.docx</a>
                        </li>
                        <li><a target="blank"
                                href="{{ asset('assets/dokumen/surat-pernyataan-tidak-pernah-dijatuhi-hukuman-disiplin.docx') }}">Surat
                                Pernyataan Tidak Pernah Dijatuhi Hukuman Disiplin.docx</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <a href="{{ route('identitas-diri.form') }}" class="btn btn-primary waves-effect waves-light">
                        Input Usul Pensiun<i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
