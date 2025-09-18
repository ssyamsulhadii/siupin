<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $guarded = [];
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_lahir_pasangan' => 'date',
        'tanggal_menikah' => 'date',
        'tanggal_bercerai' => 'date',
        'tanggal_usul' => 'date',
        'tanggal_tmt_pensiun' => 'date',
    ];

    protected array $fileColumns = [
        'path_surat_pengantar_pimpinan',
        'path_surat_pernyataan_pemohon',
        'path_surat_pernyataan_disiplin',
        'path_surat_pernyataan_pidana',
        'path_sk_cpns',
        'path_sk_pns',
        'path_sk_pangkat_terakhir',
        'surat_pmk',
        'surat_kematian_pasangan',
        'surat_janda_duda',
        'akta_menikah',
        'skp_pegawai',
        'foto_ktp',
        'foto_kk',
        'pas_foto',
        'pertek',
    ];



    public function getRouteKeyName()
    {
        return 'nip';
    }

    public function getAttribute($key)
    {
        if (str_starts_with($key, 'path_')) {
            $original = substr($key, 5);
            $value = parent::getAttribute($original);

            if ($value) {
                $folder = str_replace('_', '-', $original);
                return asset("storage/{$folder}/{$value}");
            }

            return null;
        }

        return parent::getAttribute($key);
    }


    public function listDetailAnak(): HasMany
    {
        return $this->hasMany(DetailAnak::class);
    }
    public function penerimaBerkas(): HasOne
    {
        return $this->hasOne(penerimaBerkas::class);
    }

    public function jenisPensiun(): BelongsTo
    {
        return $this->belongsTo(JenisPensiun::class);
    }
    public function jabatanNominatif(): BelongsTo
    {
        return $this->belongsTo(jabatanNominatif::class);
    }
}
