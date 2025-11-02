<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'id' => 1,
                'kelas' => 'Kelompok A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'kelas' => 'Kelompok B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
