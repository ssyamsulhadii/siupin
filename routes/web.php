<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\JabatanNominatifController;
use App\Http\Controllers\JenisPensiunController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenerimaBerkasController;
use App\Http\Controllers\userAppController;
use App\Http\Controllers\UsulPensiunController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/beranda');
Route::get('beranda', [userAppController::class, 'index'])->name('beranda.index');
Route::get('inbox-usul', [userAppController::class, 'viewInboxUsul'])->name('inbox-usul.view');
Route::get('profil-aplikasi', [userAppController::class, 'profilAplikasi'])->name('profil-aplikasi');
Route::get('buku-petunjuk', [userAppController::class, 'bukuPetunjuk'])->name('buku-petunjuk');
Route::get('dasar-pengusulan', [userAppController::class, 'dasarPengusulan'])->name('dasar-pengusulan');

Route::middleware(['auth'])->group(function () {
  // Dashboard Admin
  Route::resource('jenis-pensiun', JenisPensiunController::class)->except('show');
  Route::resource('jabatan-nominatif', JabatanNominatifController::class)->except('show');
  Route::resource('penerima-berkas', PenerimaBerkasController::class);
  Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
  Route::post('pegawai/{pegawai}/kode-progress', [PegawaiController::class, 'kodeProgress'])->name('pegawai.kode_progress');
  Route::get('pegawai/{pegawai}/detail', [PegawaiController::class, 'show'])->name('pegawai.show');
  Route::get('pegawai/{pegawai}/keterangan', [PegawaiController::class, 'keterangan'])->name('pegawai.keterangan');
  Route::post('pegawai/{pegawai}/keterangan', [PegawaiController::class, 'storeKeterangan'])->name('pegawai.keterangan');
  Route::get('pegawai/{pegawai}/is-complete', [PegawaiController::class, 'isComplete'])->name('pegawai.is_complete');
  Route::get('pegawai/export', [PegawaiController::class, 'export'])->name('pegawai.export');
  Route::delete('pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
  Route::get('pegawai/{pegawai}/{keterangan}/status-usul', [PegawaiController::class, 'updateStatusUsul'])->name('pegawai.status-usul.update');
});

// User Authentication and User Setting
Route::controller(AccountController::class)->group(function () {
  Route::middleware(['guest'])->group(function () {
    Route::get('/masuk', 'viewFormLogin')->name('login');
    Route::post('/masuk', 'authenticate')->name('authenticate');
  });
  Route::middleware(['auth'])->group(function () {
    Route::post('/keluar', 'logout')->name('logout');
  });
});


// #Identitas Diri
Route::get('usul-pensiun/identitas-diri/{pegawai?}', [UsulPensiunController::class, 'formIdentitasDiri'])->name('identitas-diri.form');
Route::post('usul-pensiun/identitas-diri', [UsulPensiunController::class, 'storeIdentitasDiri'])->name('identitas-diri.store');

// #Identitas Pasangan
Route::get('usul-pensiun/{pegawai}/identitas-pasangan', [UsulPensiunController::class, 'formIdentitasPasangan'])->name('identitas-pasangan.form');
Route::post('usul-pensiun/{pegawai}/identitas-pasangan', [UsulPensiunController::class, 'storeIdentitasPasangan'])->name('identitas-pasangan.store');

// #Identitas Anak
Route::get('usul-pensiun/{pegawai}/identitas-Anak', [UsulPensiunController::class, 'formIdentitasAnak'])->name('identitas-anak.form');
Route::post('usul-pensiun/{pegawai}/identitas-anak', [UsulPensiunController::class, 'storeIdentitasAnak'])->name('identitas-anak.store');
Route::delete('usul-pensiun/{detail_anak}/identitas-anak', [UsulPensiunController::class, 'destroyIdentitasAnak'])->name('identitas-anak.destroy');

// #Upload Dokumen
Route::get('usul-pensiun/{pegawai}/upload-dokumen', [UsulPensiunController::class, 'formUploadDokumen'])->name('upload-dokumen.form');
Route::post('usul-pensiun/{pegawai}/upload-dokumen-1', [UsulPensiunController::class, 'storeUploadDokumen1'])->name('upload-dokumen1.form');
Route::post('usul-pensiun/{pegawai}/upload-dokumen-2', [UsulPensiunController::class, 'storeUploadDokumen2'])->name('upload-dokumen2.form');

// #Final
Route::get('usul-pensiun/{pegawai}/final', [UsulPensiunController::class, 'finalUsul'])->name('usul-pensiun.final');
