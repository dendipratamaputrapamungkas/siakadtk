<?php


namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $kelas_id = $request->get('kelas_id');
        $kelas = Kelas::all();
        $absensis = collect();

        if ($kelas_id) {
            $absensis = Absensi::with('siswa')
                ->where('kelas_id', $kelas_id)
                ->orderBy('tanggal', 'desc')
                ->get()
                ->groupBy('tanggal');
        }

        return view('absensi.index', compact('kelas', 'absensis', 'kelas_id'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('absensi.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'tanggal' => 'required|date',
        ]);

        $guru_id = auth()->user()->guru->id ?? 1; // fallback kalo belum ada auth
        $siswas = Siswa::where('kelas_id', $request->kelas_id)->get();

        foreach ($siswas as $siswa) {
            Absensi::updateOrCreate(
                [
                    'siswa_id' => $siswa->id,
                    'tanggal' => $request->tanggal,
                ],
                [
                    'guru_id' => $guru_id,
                    'kelas_id' => $request->kelas_id,
                    'status' => $request->input("status.{$siswa->id}", 'hadir'),
                    'keterangan' => $request->input("keterangan.{$siswa->id}", null),
                ]
            );
        }

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan.');
    }
}
