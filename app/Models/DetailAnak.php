<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailAnak extends Model
{
    protected $table = 'detail_anak';
    protected $guarded = [];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function getKetJenisKelaminAttribute()
    {
        return $this->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan';
    }

    public function getKetMenikahAttribute()
    {
        return $this->menikah ? 'Ya' : 'Tidak';
    }


    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class);
    }
}
