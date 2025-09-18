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
        Schema::create('detail_anak', function (Blueprint $table) {
            $table->id();
            $table->char('nik', 16);
            $table->string('nama', 128);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir', 128);
            $table->boolean('menikah');
            $table->string('alamat', 128);
            $table->string('pekerjaan', 128);
            $table->char('telpon', 15);
            $table->foreignIdFor(Pegawai::class, 'pegawai_id')->constrained('pegawai', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_anak');
    }
};
