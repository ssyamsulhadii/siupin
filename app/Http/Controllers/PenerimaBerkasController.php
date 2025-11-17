<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPenerimaBerkasRequest;
use App\Models\Pegawai;
use App\Models\PenerimaBerkas;

class PenerimaBerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_penerima_berkas =  PenerimaBerkas::when(request('nama'), function ($query, $nama) {
            $query->where('nama', 'like', "%{$nama}%")
                ->orWhereHas('pegawai', function ($q) use ($nama) {
                    $q->where('nama', 'like', "%{$nama}%");
                });
        })->latest()->paginate(10)->withQueryString();
        return view('pages.penerima-berkas.index', compact('list_penerima_berkas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_pegawai = Pegawai::where('data_done', true)->whereDoesntHave('penerimaBerkas')->get();
        return view('pages.penerima-berkas.create', compact('list_pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormPenerimaBerkasRequest $request)
    {
        $validated = $request->validated();
        Pegawai::find($request->pegawai_id)->update(['status_usul' => $request->keterangan]);
        PenerimaBerkas::create($validated);
        return to_route('penerima-berkas.index')->with('swal-success', 'Data Penerima Berkas Pensiun berhasil disimpan.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenerimaBerkas $penerima_berka)
    {
        // pegawai yang ID-nya cocok + semua pegawai lain yang tidak punya relasi
        $penerima_berkas = $penerima_berka;
        $list_pegawai = Pegawai::where('data_done', true)
            ->where(function ($q) use ($penerima_berka) {
                $q->whereDoesntHave('penerimaBerkas')
                    ->orWhere('id', $penerima_berka->pegawai_id);
            })->get();
        return view('pages.penerima-berkas.edit', compact(['penerima_berkas', 'list_pegawai']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormPenerimaBerkasRequest $request, PenerimaBerkas $penerima_berka)
    {
        $penerima_berka->update($request->validated());
        return to_route('penerima-berkas.index')->with('swal-success', 'Perubahan Data Penerima Berkas Pensiun berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenerimaBerkas $penerima_berka)
    {
        $penerima_berka->delete();
        return to_route('penerima-berkas.index')->with('swal-success', 'Data Penerima Berkas Pensiun berhasil dihapus.');
    }
}
