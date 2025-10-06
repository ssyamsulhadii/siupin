<?php

use App\Models\JabatanNominatif;
use App\Models\JenisPensiun;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(JenisPensiun::class, 'jenis_pensiun_id')->constrained('jenis_pensiun', 'id')->onDelete('cascade');
            $table->foreignIdFor(JabatanNominatif::class, 'jabatan_nominatif_id')->constrained('jabatan_nominatif', 'id')->onDelete('cascade');
            // identitas diri
            $table->string('nama', 128);
            $table->char('nip', 18);
            $table->char('nkk', 16);
            $table->char('nik', 16);
            $table->date('tanggal_lahir');
            $table->date('tanggal_meninggal')->nullable();
            $table->text('alamat_sekarang');
            $table->string('unit_organisasi', 128);
            $table->string('jabatan', 128);
            $table->string('pangkat_golongan', 56);
            $table->char('telpon', 15);
            $table->text('alamat_pensiun');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->boolean('done_profile')->default(true);

            // identitas pasangan
            $table->enum('mempunyai_pasangan', ['ya', 'tidak', 'bercerai'])->nullable();
            $table->enum('status_pasangan', ['hidup', 'meninggal', 'tidak punya'])->nullable();
            $table->string('nama_pasangan')->nullable();
            $table->char('nik_pasangan', 16)->nullable();
            $table->string('pekerjaan_pasangan', 128)->nullable();
            $table->date('tanggal_lahir_pasangan')->nullable();
            $table->string('no_akta_nikah', 128)->nullable();
            $table->date('tanggal_menikah')->nullable();
            $table->date('tanggal_bercerai')->nullable();
            $table->date('tanggal_meninggal_pasangan')->nullable();
            $table->boolean('mempunyai_anak')->nullable();
            $table->tinyInteger('jumlah_anak')->nullable();
            $table->boolean('done_partner')->default(false);

            // upload dokumen
            $table->string('surat_pengantar_pimpinan')->nullable();
            $table->string('surat_pernyataan_pemohon')->nullable();
            $table->string('surat_pernyataan_disiplin')->nullable();
            $table->string('surat_pernyataan_pidana')->nullable();
            $table->string('sk_cpns')->nullable();
            $table->string('sk_pns')->nullable();
            $table->string('sk_pangkat_terakhir')->nullable();

            $table->string('surat_pmk')->nullable(); //opsional
            $table->string('surat_kematian_pasangan')->nullable(); //opsional
            $table->string('surat_janda_duda')->nullable(); //opsional
            $table->string('akta_menikah')->nullable(); //opsional
            $table->string('skp_pegawai')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('foto_kk')->nullable();
            $table->string('pas_foto')->nullable();
            $table->boolean('done_document')->default(false);

            // keterangan lainnya
            // saat tombol final diklik update data kolom ini
            $table->boolean('data_done')->default(false); //ototmatis
            $table->date('tanggal_usul')->nullable(); //otomatis
            $table->string('status_usul', 256)->nullable(); //otomatis dan diupdate oleh admin
            $table->date('tanggal_tmt_pensiun')->nullable(); //otomatis
            $table->string('pertek')->nullable(); //opsional

            $table->tinyInteger('kode_progress')->default(5); //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
