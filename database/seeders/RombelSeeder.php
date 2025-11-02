<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RombelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rombels')->insert([
            [
                'id' => 1,
                'kelas_id' => 1,
                'nama' => 'A1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'kelas_id' => 1,
                'nama' => 'A2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'kelas_id' => 2,
                'nama_rombel' => 'B1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'kelas_id' => 2,
                'nama_rombel' => 'B2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
