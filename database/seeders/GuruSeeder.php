<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::insert([
            [
                'nama' => 'Budi Santoso',
                'nip' => '197801012005011001',
                'jabatan' => 'Guru Kelas',
                'no_hp' => '081234567890',
                'tempatlhr' => 'Bandung',
                'tgl_lhr' => '1980-01-01',
                'ibu_kandung' => 'Siti Aminah',
                'status' => 'PNS',
                'jenisgtk' => 'Guru SD',
                'kelas_id' => 1,   // pastikan ID kelas dan rombel ini ada di DB
                'rombel_id' => 1,
                'tingkatpd' => 'Tingkat 6',
                'kurikulum' => 'Kurikulum Merdeka',
                'walikelas' => 'Ya',
                'ruangan' => 'Ruang A1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Rahmawati',
                'nip' => '198503122010022002',
                'jabatan' => 'Guru Mapel',
                'no_hp' => '081345678901',
                'tempatlhr' => 'Jakarta',
                'tgl_lhr' => '1985-03-12',
                'ibu_kandung' => 'Nurhayati',
                'status' => 'Honorer',
                'jenisgtk' => 'Guru Bahasa Indonesia',
                'kelas_id' => 1,
                'rombel_id' => 2,
                'tingkatpd' => 'Tingkat 5',
                'kurikulum' => 'Kurikulum 2013',
                'walikelas' => 'Tidak',
                'ruangan' => 'Ruang B2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ahmad Fauzi',
                'nip' => '199001152015031003',
                'jabatan' => 'Guru PJOK',
                'no_hp' => '081298765432',
                'tempatlhr' => 'Surabaya',
                'tgl_lhr' => '1990-01-15',
                'ibu_kandung' => 'Rukmini',
                'status' => 'Kontrak',
                'jenisgtk' => 'Guru Olahraga',
                'kelas_id' => 2,
                'rombel_id' => 3,
                'tingkatpd' => 'Tingkat 4',
                'kurikulum' => 'Kurikulum Merdeka',
                'walikelas' => 'Tidak',
                'ruangan' => 'Lapangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        $this->call(GuruSeeder::class);

    }
}
