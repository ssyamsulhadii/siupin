<?php

namespace App\Http\Controllers;

use App\Models\JenisPensiun;
use App\Models\Pegawai;

class userAppController extends Controller
{
    public function index()
    {
        $list_jenis_pensiun = JenisPensiun::withCount('pegawai')->get();
        $pegawai_count = Pegawai::count();
        return view('pages.user-app.index', compact('list_jenis_pensiun', 'pegawai_count'));
    }
    public function profilAplikasi()
    {
        return view('pages.user-app.profil-aplikasi');
    }
    public function viewInboxUsul()
    {
        if (request('nip')) {
            $pegawai = Pegawai::firstWhere('nip', request('nip'));
        }
        return view('pages.user-app.inbox-usul', ['pegawai' => $pegawai ?? null]);
    }

    public function bukuPetunjuk()
    {
        return view('pages.user-app.buku-petunjuk');
    }
    public function dasarPengusulan()
    {
        return view('pages.user-app.dasar-pengusulan');
    }
}
