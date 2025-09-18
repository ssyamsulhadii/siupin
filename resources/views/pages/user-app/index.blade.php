@extends('layouts.app')
@section('content')
    <x-others.page-title title="Beranda" subtitle="Tampil Data" link="{{ route('beranda.index') }}"></x-others.page-title>
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
                            Tetaplah menjadi baik, jika berentung kita akan menemukan orang baik, jika tidak kita akan
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
                        <li>Surat Edaran Bupati Kabupaten Kapuas No 800/522/P3I/BKPSDM/2024 tentang Penyampaian Usulan
                            Pensiun PNS Dilingkungan
                            Pemerintah Kabupaten Kapuas</li>
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
                <p>Adapun persyaratan yang diperlukan dalam usul pensiun antara lain:</p>
                <ol>
                    <li><strong>Surat Pengantar Pimpinan</strong>, sebagai dasar usulan dari instansi tempat pegawai
                        bertugas.</li>
                    <li><strong>Surat Pernyataan Pemohon</strong>, berisi permohonan resmi untuk pensiun.</li>
                    <li><strong>Surat Pernyataan Disiplin</strong>, menyatakan tidak pernah dijatuhi hukuman disiplin
                        tingkat sedang maupun berat.</li>
                    <li><strong>Surat Pernyataan Pidana</strong>, menyatakan tidak pernah dipidana atau sedang menjalani
                        proses pidana.</li>
                    <li><strong>SK CPNS</strong> sebagai dasar pengangkatan pertama.</li>
                    <li><strong>SK PNS</strong> sebagai bukti pengangkatan sebagai pegawai tetap.</li>
                    <li><strong>SK Pangkat Terakhir</strong> sesuai kedudukan pegawai saat mengajukan pensiun.</li>
                    <li><strong>Surat PMK (Peninjauan Masa Kerja)</strong> apabila ada penyesuaian masa kerja.</li>
                    <li><strong>Surat Kematian Pasangan</strong>, bagi pegawai yang pasangannya telah meninggal dunia.</li>
                    <li><strong>Surat Keterangan Janda/Duda</strong>, bagi pegawai yang berstatus janda atau duda.</li>
                    <li><strong>Akta Nikah</strong>, sebagai bukti pernikahan yang sah menurut hukum.</li>
                    <li><strong>SKP (Sasaran Kinerja Pegawai)</strong> tahun terakhir.</li>
                    <li><strong>Foto KTP</strong> (Kartu Tanda Penduduk).</li>
                    <li><strong>Foto KK</strong> (Kartu Keluarga).</li>
                    <li><strong>Pas Foto Terbaru</strong> sesuai ketentuan yang berlaku.</li>
                </ol>
                <div class="card bg-warning">
                    <div class="card-body pb-0">
                        <p class="text-dark"><b>Perhatian</b>: Berkas usul yang tidak dilengkapi setelah diinput
                            dalam seminggu kerja akan dihapus oleh admin.</p>

                        <p class="text-dark" style="text-align: justify">
                            Seluruh dokumen harus diupload secara lengkap, jelas, dan sah (dilegalisir apabila diperlukan)
                            untuk
                            memperlancar proses verifikasi oleh pejabat berwenang sehingga usul pensiun dapat diproses dan
                            ditetapkan sesuai ketentuan, selain dari pas foto dokumen persyaratan berbentuk pdf dengan
                            ukuran file kurang dari 700 kb. </p>
                    </div>
                </div>
                <div>
                    Download surat pernyataan pemohon usul pensiun
                    <ul>
                        <li><a target="blank"
                                href="{{ asset('assets/dokumen/surat-pernyataan-pemohon-bup.docx') }}">surat-pernyataan-pemohon-bup.docx</a>
                        </li>
                        <li><a target="blank"
                                href="{{ asset('assets/dokumen/surat-pernyataan-pemohon-aps.docx') }}">surat-pernyataan-pemohon-aps.docx</a>
                        </li>
                        <li><a target="blank"
                                href="{{ asset('assets/dokumen/surat-pernyataan-pemohon-dini.docx') }}">surat-pernyataan-pemohon-dini.docx</a>
                        </li>
                        <li><a target="blank"
                                href="{{ asset('assets/dokumen/surat-pernyataan-pemohon-janda-duda.docx') }}">surat-pernyataan-pemohon-janda-duda.docx</a>
                        </li>
                        <li><a target="blank"
                                href="{{ asset('assets/dokumen/surat-pernyataan-pemohon-yatim-piatu.docx') }}">surat-pernyataan-pemohon-yatim-piatu.docx</a>
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
