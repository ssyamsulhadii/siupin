<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisPensiun extends Model
{
    protected $table = 'jenis_pensiun';
    protected $fillable = ['nama', 'keterangan'];

    /**
     * Get all of the comments for the JenisPensiun
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class);
    }
}
