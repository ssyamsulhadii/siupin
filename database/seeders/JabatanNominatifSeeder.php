<?php

namespace Database\Seeders;

use App\Models\JabatanNominatif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanNominatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_data = [
            ['Jabatan Struktural JPT', 60],
            ['Jabatan Struktural Administrasi', 58],
            ['Jabatan Fungsional Madya', 60],
            ['Jabatan Fungsional Guru', 60],
            ['Jabatan Fungsional Pratama/Muda', 58],
            ['Jabatan Fungsional Terampil', 58],
            ['Jabatan Pelaksana', 58],
        ];
        foreach ($list_data as $data) {
            JabatanNominatif::create([
                'nama' => $data[0],
                'bup' => $data[1],
            ]);
        }
    }
}
