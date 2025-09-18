<?php

namespace Database\Seeders;

use App\Models\JenisPensiun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPensiunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_data = [
            'Pensiun BUP (Batas Usia Pensiun)',
            'Pensiun Atas Permintaan Sendiri (APS)',
            'Pensiun Janda Duda',
            'Pensiun Yatim Piatu',
            'Pensiun Dini',
        ];
        foreach ($list_data as $data) {
            JenisPensiun::create([
                'nama' => $data,
                'keterangan' => '-',
            ]);
        }
    }
}
