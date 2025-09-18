<?php

namespace App\Http\Controllers;

use App\Http\Requests\formIdentitasAnakRequest;
use App\Http\Requests\formIdentitasDiriRequest;
use App\Http\Requests\formIdentitasPasanganRequest;
use App\Http\Requests\formUploadDokumen1Request;
use App\Http\Requests\formUploadDokumen2Request;
use App\Models\DetailAnak;
use App\Models\JabatanNominatif;
use App\Models\JenisPensiun;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Storage;

class UsulPensiunController extends Controller
{
    public function formIdentitasDiri(?Pegawai $pegawai = null)
    {
        if (request('nip')) {
            $pegawai = Pegawai::firstWhere('nip', request('nip'));
            if ($pegawai?->data_done) {
                return back()->with('swal-warning', $pegawai->status_usul);
            }
        }
        return view('pages.usul-pensiun.identitas-diri', [
            'list_jenis_pensiun' => JenisPensiun::get(),
            'list_jabatan_nominatif' => JabatanNominatif::get(),
            'pegawai' => $pegawai,
            'pil_jk' => $this->callData()['pil_jk'],
            'pil_pangkat_golongan' => $this->callData()['pil_pangkat_golongan'],
        ]);
    }

    public function storeIdentitasDiri(formIdentitasDiriRequest $request)
    {
        $validated =  $request->validated();
        $done = Pegawai::firstWhere('nip', $request->nip);
        if ($done?->data_done) {
            return back()->with('swal-warning', $done->status_usul);
        }

        $pegawai = Pegawai::updateOrCreate(
            ['nip' => $request->nip],
            $validated
        );
        return to_route('identitas-diri.form', ['nip' => $pegawai->nip])->with('swal-success', 'Data Identitas Diri berhasil disimpan, silakan input <br><b>Identitas Pasangan</b>.');
    }

    public function formIdentitasPasangan(Pegawai $pegawai)
    {
        return view('pages.usul-pensiun.identitas-pasangan', [
            'pegawai' => $pegawai,
            'pil_mempunyai_pasangan' => $this->callData()['pil_mempunyai_pasangan'],
            'pil_status_pasangan' => $this->callData()['pil_status_pasangan'],
            'pil_umum' => $this->callData()['pil_umum'],
            'list_numbers' => $this->callData()['list_numbers'],
        ]);
    }

    public function storeIdentitasPasangan(formIdentitasPasanganRequest $request, Pegawai $pegawai)
    {
        $validated = $request->validated();
        $pegawai->update($validated);
        return to_route('identitas-pasangan.form', ['pegawai' => $pegawai->nip])->with('swal-success', 'Data Identitas Pasangan berhasil disimpan, silakan input <br><b>Identitas Anak</b>.');
    }

    public function formIdentitasAnak(Pegawai $pegawai)
    {
        return view('pages.usul-pensiun.identitas-anak', [
            'pegawai' => $pegawai,
            'pil_umum' => $this->callData()['pil_umum'],
            'pil_jk' => $this->callData()['pil_jk'],
        ]);
    }

    public function storeIdentitasAnak(formIdentitasAnakRequest $request, Pegawai $pegawai)
    {
        $validated = $request->validated();
        if (count($pegawai->listDetailAnak) == $pegawai->jumlah_anak) {
            return back()->with('swal-warning', 'Data anak sudah terpenuhi. Silakan edit, jumlah anak');
        } else {
            DetailAnak::create($validated);
            return to_route('identitas-anak.form', ['pegawai' => $pegawai->nip])->with('swal-success', 'Data Identitas Anak berhasil disimpan.');
        }
    }

    public function destroyIdentitasAnak(DetailAnak $detail_anak)
    {
        $nip = $detail_anak->pegawai->nip;
        $detail_anak->delete();
        return to_route('identitas-anak.form', ['pegawai' => $nip])->with('swal-success', 'Data Identitas Anak berhasil dihapus.');
    }


    public function formUploadDokumen(Pegawai $pegawai)
    {
        return view('pages.usul-pensiun.upload-dokumen', compact('pegawai'));
    }


    public function storeUploadDokumen1(formUploadDokumen1Request $request, Pegawai $pegawai)
    {
        $columns = [
            'surat_pengantar_pimpinan',
            'surat_pernyataan_pemohon',
            'surat_pernyataan_disiplin',
            'surat_pernyataan_pidana',
            'sk_cpns',
            'sk_pns',
            'sk_pangkat_terakhir',
        ];
        $uploadedFiles = $this->uploadFiles($request, $columns, $pegawai);
        $pegawai->update($uploadedFiles);

        return to_route('upload-dokumen.form', ['pegawai' => $pegawai->nip])
            ->with('swal-success', 'Data Upload Dokumen Bagian I berhasil disimpan.');
    }
    public function storeUploadDokumen2(formUploadDokumen2Request $request, Pegawai $pegawai)
    {
        $columns = [
            'surat_pmk',
            'surat_kematian_pasangan',
            'surat_janda_duda',
            'akta_menikah',
            'skp_pegawai',
            'foto_ktp',
            'foto_kk',
            'pas_foto',
        ];
        $uploadedFiles = $this->uploadFiles($request, $columns, $pegawai);
        $uploadedFiles['done_document'] = true;
        $pegawai->update($uploadedFiles);
        return to_route('upload-dokumen.form', ['pegawai' => $pegawai->nip])
            ->with('swal-success', 'Data Upload Dokumen Bagian II berhasil disimpan.');
    }

    public function finalUsul(Pegawai $pegawai)
    {
        if ($pegawai->tanggal_meninggal) {
            $tmt_pensiun = $pegawai->tanggal_meninggal->copy()->addDay();
        } else {
            $tmt_pensiun = $pegawai->tanggal_lahir->copy()->addYears($pegawai->jabatanNominatif->bup)->addMonthNoOverflow()->startOfMonth();
        }
        $data = [
            'data_done' => true,
            'tanggal_usul' => date(now()),
            'status_usul' => 'Berkas Anda saat ini dalam tahap verifikasi.',
            'tanggal_tmt_pensiun' => $tmt_pensiun,
        ];
        $pegawai->update($data);
        return to_route('identitas-diri.form')->with('swal-success', 'Terimakasih, Data Anda berhasil diusulkan.');
    }



    private function uploadFiles($request, array $columns, $oldFiles = [])
    {
        $result = [];
        foreach ($columns as $column) {
            // kalau ada file lama, hapus dulu
            if (!empty($oldFiles[$column])) {
                if ($request->hasFile($column)) {
                    Storage::delete('public/' . str_replace("_", "-", $column) . '/' . $oldFiles[$column]);
                }
            }
            // upload file baru
            if ($request->hasFile($column)) {
                $file = $request->file($column);
                $nama_file = $file->hashName();
                $file->storeAs('public/' . str_replace("_", "-", $column), $nama_file);
                $result[$column] = $nama_file;
            }
        }
        return $result;
    }



    private function callData(): array
    {
        $pil_mempunyai_pasangan = [
            ['id' => 'ya', 'nama' => 'Ya'],
            ['id' => 'tidak', 'nama' => 'Tidak'],
            ['id' => 'bercerai', 'nama' => 'Bercerai'],
        ];
        $pil_status_pasangan = [
            ['id' => 'hidup', 'nama' => 'Hidup'],
            ['id' => 'meninggal', 'nama' => 'Meninggal'],
            ['id' => 'tidak punya', 'nama' => 'Tidak Punya'],
        ];

        $pil_umum = [
            ['id' => '1', 'nama' => 'Ya'],
            ['id' => '0', 'nama' => 'Tidak'],
        ];

        $pil_jk = [
            ['id' => 'L', 'nama' => 'Laki-Laki'],
            ['id' => 'P', 'nama' => 'Perempuan'],
        ];
        $list_numbers = [
            ['id' => '0', 'nama' => '0'],
            ['id' => '1', 'nama' => '1'],
            ['id' => '2', 'nama' => '2'],
            ['id' => '3', 'nama' => '3'],
        ];
        $pil_pangkat_golongan = [
            ['id' => 'Pembina Utama - IV/e', 'nama' => 'Pembina Utama - IV/e'],
            ['id' => 'Pembina Utama Madya - IV/d', 'nama' => 'Pembina Utama Madya - IV/d'],
            ['id' => 'Pembina Utama Muda - IV/c', 'nama' => 'Pembina Utama Muda - IV/c'],
            ['id' => 'Pembina Tingkat I - IV/b', 'nama' => 'Pembina Tingkat I - IV/b'],
            ['id' => 'Pembina - IV/a', 'nama' => 'Pembina - IV/a'],
            ['id' => 'Penata Tingkat I - III/d', 'nama' => 'Penata Tingkat I - III/d'],
            ['id' => 'Penata - III/c', 'nama' => 'Penata - III/c'],
            ['id' => 'Penata Muda Tingkat I - III/b', 'nama' => 'Penata Muda Tingkat I - III/b'],
            ['id' => 'Penata Muda - III/a', 'nama' => 'Penata Muda - III/a'],
            ['id' => 'Pengatur Tingkat I - II/d', 'nama' => 'Pengatur Tingkat I - II/d'],
            ['id' => 'Pengatur - II/c', 'nama' => 'Pengatur - II/c'],
            ['id' => 'Pengatur Muda Tingkat I - II/b', 'nama' => 'Pengatur Muda Tingkat I - II/b'],
            ['id' => 'Pengatur Muda - II/a', 'nama' => 'Pengatur Muda - II/a']
        ];
        return [
            'pil_mempunyai_pasangan' =>    json_decode(json_encode($pil_mempunyai_pasangan)),
            'pil_status_pasangan' =>    json_decode(json_encode($pil_status_pasangan)),
            'pil_umum' =>    json_decode(json_encode($pil_umum)),
            'list_numbers' =>    json_decode(json_encode($list_numbers)),
            'pil_jk' =>    json_decode(json_encode($pil_jk)),
            'pil_pangkat_golongan' =>    json_decode(json_encode($pil_pangkat_golongan)),
        ];
    }
}
