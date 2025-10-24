<?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

// class TemaRpmSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         //
//     }
// }

use Illuminate\Database\Seeder;
use App\Models\TemaRPM;
use App\Models\RppDimensi;
use App\Models\RppTujuan;
use App\Models\RppLangkah;
use App\Models\RppAsesmen;

class TemaRpmSeeder extends Seeder
{
    public function run(): void
    {
        // Insert ke tabel rpp
        $rpp = tema_r_p_m_s::create([
            'kelompok' => 'B',
            'tema' => 'Diriku',
            'tanggal' => '2025-09-18'
        ]);

        // Dimensi Profil
        $dimensi = [
            'Keimanan dan Ketakwaan',
            'Kewargaan',
            'Penalaran Kritis',
            'Kreativitas',
            'Kolaborasi',
            'Kemandirian',
            'Kesehatan',
            'Komunikasi',
        ];
        foreach($dimensi as $d){
            RppDimensi::create([
                'rpp_id' => $rpp->id,
                'dimensi' => $d
            ]);
        }

        // Tujuan Pembelajaran
        $tujuan = [
            'Anak dapat mengenal Tuhan Yang Maha Esa',
            'Anak dapat mengenal identitas dirinya',
            'Anak dapat menyebutkan anggota tubuh',
            'Anak dapat membedakan yang baik untuk dirinya'
        ];
        foreach($tujuan as $t){
            RppTujuan::create([
                'rpp_id' => $rpp->id,
                'tujuan' => $t
            ]);
        }

        // Langkah Pendahuluan
        $pendahuluan = [
            'Baris berbaris (menggembirakan)',
            'Berdoa (berkesadaran)',
            'Absensi (berkesadaran)',
            'Bercerita tentang diriku (berkesadaran)',
            'Menyanyikan lagu "kepala pundak"',
            'Menyanyikan lagu "sentuhan boleh dan jangan"',
        ];
        foreach($pendahuluan as $p){
            RppLangkah::create([
                'rpp_id'=>$rpp->id,
                'tahap'=>'pendahuluan',
                'isi'=>$p
            ]);
        }

        // Langkah Inti
        $inti = [
            'Bermain meniru gaya: pegang kepala, kaki, tangan, mulut, telinga, rambut, dll',
            'Mengenal tulisan anggota tubuh disertai gambar',
            'Mewarnai gambar "diriku"',
        ];
        foreach($inti as $i){
            RppLangkah::create([
                'rpp_id'=>$rpp->id,
                'tahap'=>'inti',
                'isi'=>$i
            ]);
        }

        // Langkah Penutup
        $penutup = [
            'Guru menanyakan perasaan kegiatan yang telah berlangsung',
            'Guru dan murid menyimpulkan manfaat pembelajaran',
            'Memberikan umpan balik terhadap proses dan hasil pembelajaran',
            'Menginformasikan rencana kegiatan berikutnya'
        ];
        foreach($penutup as $n){
            RppLangkah::create([
                'rpp_id'=>$rpp->id,
                'tahap'=>'penutup',
                'isi'=>$n
            ]);
        }

        // Asesmen
        foreach(['Observasi ceklis','Dokumentasi','Anekdot'] as $a){
            RppAsesmen::create([
                'rpp_id'=>$rpp->id,
                'jenis'=>$a
            ]);
        }
    }
}

