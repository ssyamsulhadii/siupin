<?php

namespace App\Http\Controllers;

use App\Models\JenisPensiun;
use Illuminate\Http\Request;

class JenisPensiunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_jenis_pensiun = JenisPensiun::latest()->get();
        return view('pages.jenis-pensiun.index', compact('list_jenis_pensiun'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jenis-pensiun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['nama' => 'required|string', 'keterangan' => 'required|string']);
        JenisPensiun::create($validated);
        return to_route('jenis-pensiun.index')->with('swal-success', 'Data jenis pensiun berhasil disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPensiun $jenis_pensiun)
    {
        return view('pages.jenis-pensiun.edit', compact('jenis_pensiun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPensiun $jenis_pensiun)
    {
        $validated = $request->validate(['nama' => 'required|string', 'keterangan' => 'required|string']);
        $jenis_pensiun->update($validated);
        return to_route('jenis-pensiun.index')->with('swal-success', 'Data perubahan jenis pensiun berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPensiun $jenis_pensiun)
    {
        $jenis_pensiun->delete();
        return to_route('jenis-pensiun.index')->with('swal-success', 'Data jenis pensiun berhasil dihapus.');
    }
}
