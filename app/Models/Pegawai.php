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
        'tanggal_meninggal' => 'date',
        'tanggal_meninggal_pasangan' => 'date',
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

    public function getKodeProgressBadgeAttribute(): string
    {
        $map = [
            1 => 'badge bg-success text-white',   // Hijau
            2 => 'badge bg-primary text-white',   // Biru
            3 => 'badge bg-warning text-dark',    // Orange/kuning gelap (default bootstrap warning)
            4 => 'badge text-dark',              // Kuning -> handle manual
            5 => 'badge bg-secondary text-white', // Abu-abu
            6 => 'badge bg-danger text-white',    // Merah
        ];

        $kp = (int) $this->kode_progress;

        if ($kp === 4) {
            // custom kuning dengan teks putih
            return sprintf(
                '<span class="%s fa-1x" style="background: yellow;">%s</span>',
                e($map[$kp]),
                e($this->nama)
            );
        }
        $class = $map[$kp] ?? 'badge bg-secondary text-white';
        return sprintf(
            '<span class="%s fa-1x">%s</span>',
            e($class),
            e($this->nama)
        );
    }

    public function getProgressUsulAttribute(): string
    {
        $progress = [
            1 => 'Sudah Diterima',
            2 => 'Sudah TTE',
            3 => 'Input SIASN',
            4 => 'Dokumen Tarik',
            5 => 'Dokumen Masuk',
            6 => 'Dokumen Batal',
        ];

        return $this->kode_progress
            ? ($progress[$this->kode_progress] ?? null)
            : null;
    }

    public function getWhatsappLinkAttribute(): ?string
    {
        // ubah 0xxx jadi 62xxx
        $no = preg_replace('/^0/', '62', $this->telpon);
        return "https://wa.me/{$no}";
    }


    public function listDetailAnak(): HasMany
    {
        return $this->hasMany(DetailAnak::class);
    }
    public function penerimaBerkas(): HasOne
    {
        return $this->hasOne(PenerimaBerkas::class);
    }

    public function jenisPensiun(): BelongsTo
    {
        return $this->belongsTo(JenisPensiun::class);
    }
    public function jabatanNominatif(): BelongsTo
    {
        return $this->belongsTo(JabatanNominatif::class);
    }
}
