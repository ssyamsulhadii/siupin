<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\SimpleExcel\SimpleExcelWriter;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_pegawai =
            Pegawai::when(request('search'), function ($query, $search) {
                $query->where(function ($sub) use ($search) {
                    $sub->where('nama', 'like', "%{$search}%")
                        ->orWhere('nip', 'like', "%{$search}%");
                });
            })->orderBy('tanggal_usul', 'desc')->latest()->paginate(10)->withQueryString();
        return view('pages.pegawai.index', compact('list_pegawai'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        return view('pages.pegawai.detail', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatusUsul(Pegawai $pegawai, $keterangan)
    {
        $pegawai->update(['status_usul' => $keterangan]);
        return back()->with('swal-success', 'Perubahan data Status Usul berhasil disimpan.');
    }
    public function isComplete(Pegawai $pegawai)
    {
        $pegawai->update(['data_done' => !$pegawai->data_done]);
        return back()->with('swal-success', 'Status perubahan berhasil disimpan.');
    }

    public function export()
    {
        // ambil data pegawai, contoh: hanya yang data_done = true
        $pegawai = Pegawai::where('data_done', true)
            ->orderBy('tanggal_usul', 'desc')
            ->get(['nip', 'nama', 'tanggal_usul']);

        // buat file excel sementara
        $filePath = storage_path('app/data-pegawai-usul-pensiun.xlsx');

        $writer = SimpleExcelWriter::create($filePath);

        // tambahkan data
        foreach ($pegawai as $p) {
            $writer->addRow([
                'NIP'          => $p->nip,
                'Nama'         => $p->nama,
                'Tanggal Usul' => optional($p->tanggal_usul)->format('Y-m-d'),
            ]);
        }
        $writer->close();
        // kembalikan sebagai download response
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function uploadPertek(Pegawai $pegawai)
    {
        return view('pages.pegawai.upload-pertek', compact('pegawai'));
    }
    public function storeUploadPertek(Request $request, Pegawai $pegawai)
    {
        $validated = $request->validate([
            'pertek' => 'required|file|mimes:pdf|max:500',
            'status_usul' => 'required|string',
        ], [
            'status_usul.required' => 'Kolom Keterangan wajib diisi.',
            'pertek.required' => 'File Pertek wajib diupload.',
        ]);
        Storage::delete('public/pertek/' . $pegawai->pertek);
        $nama_file = $request->pertek->hashName();
        $request->pertek->storeAs('public/pertek', $nama_file);
        $validated['pertek'] = $nama_file;
        $pegawai->update($validated);
        return back()->with('swal-success', 'Dokumen pertek berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        Storage::delete('public/surat-pengantar-pimpinan/' . $pegawai->surat_pengantar_pimpinan);
        Storage::delete('public/surat-pernyataan-pemohon/' . $pegawai->surat_pernyataan_pemohon);
        Storage::delete('public/surat-pernyataan-disiplin/' . $pegawai->surat_pernyataan_disiplin);
        Storage::delete('public/surat-pernyataan-pidana/' . $pegawai->surat_pernyataan_pidana);
        Storage::delete('public/sk-cpns/' . $pegawai->sk_cpns);
        Storage::delete('public/sk-pns/' . $pegawai->sk_pns);
        Storage::delete('public/sk-pangkat-terakhir/' . $pegawai->sk_pangkat_terakhir);
        Storage::delete('public/surat-pmk/' . $pegawai->surat_pmk);
        Storage::delete('public/surat-kematian-pasangan/' . $pegawai->surat_kematian_pasangan);
        Storage::delete('public/surat-janda-duda/' . $pegawai->surat_janda_duda);
        Storage::delete('public/akta-menikah/' . $pegawai->akta_menikah);
        Storage::delete('public/skp-pegawai/' . $pegawai->skp_pegawai);
        Storage::delete('public/foto-ktp/' . $pegawai->foto_ktp);
        Storage::delete('public/foto-kk/' . $pegawai->foto_kk);
        Storage::delete('public/pas-foto/' . $pegawai->pas_foto);
        $pegawai->delete();
        return back()->with('swal-success', 'Data Status Usul Pensiun berhasil dihapus.');
    }
}
