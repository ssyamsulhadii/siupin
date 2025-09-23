<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenerimaBerkas extends Model
{
    protected $table = 'penerima_berkas';
    protected $fillable = [
        'nama',
        'telpon',
        'tanggal_pengambilan',
        'keterangan',
        'pegawai_id',
    ];
    protected $with = ['pegawai'];
    protected $casts = ['tanggal_pengambilan' => 'date'];

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class);
    }
}
