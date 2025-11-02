<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswas')->insert([
            [
                'nisn' => '00220122',
                'nama_lengkap' => 'Ayu Azzahra Hermawan',
                'no_kk' => '51651531',
                'tempatlhr' => 'Cianjur',
                'tanggal_lhr' => '2021-03-30',
                'jk' => 'P',
                'agama' => 'Islam',
                'kelas_id' => 1,
                'rombel_id' => 1,
                'no_indukpd' => '0220202',
                'tgl_masuk' => '2025-07-10',
                'alamat' => 'Kp. Botat RT 02 RW 01, Cianjur',
                'nama_ayah' => 'Asep Hermawan',
                'nama_ibu' => 'Nunung Herawati',
                'wali' => 'Asep Hermawan',
                'no_hp' => '081214514145',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '220123',
                'nama_lengkap' => 'Raisa Wahab',
                'no_kk' => '51651532',
                'tempatlhr' => 'Cianjur',
                'tanggal_lhr' => '2019-11-17',
                'jk' => 'P',
                'agama' => 'Islam',
                'kelas_id' => 1,
                'rombel_id' => 1,
                'no_indukpd' => '220203',
                'tgl_masuk' => '2025-07-11',
                'alamat' => 'Jl. Gunteng, Cianjur',
                'nama_ayah' => 'M. Fahmi Wahab',
                'nama_ibu' => 'Novi Priyanti',
                'wali' => 'Novi Priyanti',
                'no_hp' => '085145146111',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
