<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormJabatanNominatifRequest;
use App\Models\JabatanNominatif;
use Illuminate\Http\Request;

class JabatanNominatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_jabatan_nominatif = JabatanNominatif::all();
        return view('pages.jabatan-nominatif.index', compact('list_jabatan_nominatif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jabatan-nominatif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormJabatanNominatifRequest $request)
    {
        $validated = $request->validated();
        JabatanNominatif::create($validated);
        return to_route('jabatan-nominatif.index')->with('swal-success', 'Data jabatan nominatif berhasil disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JabatanNominatif $jabatan_nominatif)
    {
        return view('pages.jabatan-nominatif.edit', compact('jabatan_nominatif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormJabatanNominatifRequest $request, JabatanNominatif $jabatan_nominatif)
    {
        $validated = $request->validated();
        $jabatan_nominatif->update($validated);
        return to_route('jabatan-nominatif.index')->with('swal-success', 'Perubahan Data jabatan nominatif berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JabatanNominatif $jabatan_nominatif)
    {
        $jabatan_nominatif->delete();
        return to_route('jabatan-nominatif.index')->with('swal-success', 'Data jabatan nominatif berhasil dihapus.');
    }
}
