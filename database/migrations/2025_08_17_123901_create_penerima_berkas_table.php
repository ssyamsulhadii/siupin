<?php

use App\Models\Pegawai;
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
        Schema::create('penerima_berkas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 128);
            $table->char('telpon', 15);
            $table->date('tanggal_pengambilan');
            $table->string('keterangan', 256);
            $table->foreignIdFor(Pegawai::class, 'pegawai_id')->constrained('pegawai', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_berkas');
    }
};
