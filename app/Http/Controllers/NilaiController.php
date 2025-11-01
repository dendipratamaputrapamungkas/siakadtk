<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\TemaRPM;
use App\Models\RppLangkah;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    // 📘 TAMPILAN UTAMA - pilih kelas
    public function index()
    {
        $kelass = Kelas::all();
        return view('nilai.index', compact('kelass'));
    }

    // 🧩 PILIH KELAS → tampilkan tema yang terkait
    public function kelas($kelas_id)
    {
        $kelas = Kelas::findOrFail($kelas_id);
        $temas = TemaRPM::where('kelas_id', $kelas_id)->get();

        return view('nilai.kelas', compact('kelas', 'temas'));
    }

    // 📝 FORM INPUT NILAI
    public function create($tema_id)
    {
        $tema = TemaRPM::with('kelas', 'guru')->findOrFail($tema_id);
        $siswas = Siswa::where('kelas_id', $tema->kelas_id)->get();
        $langkahs = RppLangkah::where('tema_r_p_m_s_id', $tema_id)->get();

        return view('nilai.create', compact('tema', 'siswas', 'langkahs'));
    }

    // 💾 SIMPAN NILAI
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tema_r_p_m_s_id' => 'required',
            'siswa_id' => 'required',
            'nilai' => 'required|array',
        ]);

        foreach ($validated['nilai'] as $langkah_id => $data) {
            Nilai::updateOrCreate(
                [
                    'siswa_id' => $validated['siswa_id'],
                    'rpp_langkah_id' => $langkah_id,
                ],
                [
                    'guru_id' => auth()->user()->guru->id ?? 1,
                    'tema_r_p_m_s_id' => $validated['tema_r_p_m_s_id'],
                    'kategori_nilai' => $data['kategori_nilai'],
                    'deskripsi' => $data['deskripsi'],
                ]
            );
        }

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil disimpan.');
    }
}
