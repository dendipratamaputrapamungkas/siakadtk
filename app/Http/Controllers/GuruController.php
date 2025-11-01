<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Rombel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.index');
    }

    public function data()
    {
        $query = Guru::with(['kelas', 'rombel'])->select('gurus.*');

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('aksi', function ($guru) {
                $edit = '<a href="' . route('guru.edit', $guru->id) . '" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                         </a>';
                $delete = '<form action="' . route('guru.destroy', $guru->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm(\'Yakin mau hapus data ini?\')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('kelas', function ($guru) {
                return $guru->kelas->nama ?? '-';
            })
            ->addColumn('rombel', function ($guru) {
                return $guru->rombel->nama ?? '-';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function create()
    {
        $kelas = Kelas::all();
        $rombels = Rombel::all();
        return view('guru.create', compact('kelas', 'rombels'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50|unique:gurus',
            'jabatan' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:20',
            'tenpatlhr' => 'nullable|string|max:100',
            'tgl_lhr' => 'nullable|date',
            'ibu_kandung' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'jenisgtk' => 'nullable|string|max:100',
            'kelas_id' => 'required|exists:kelas,id',
            'rombel_id' => 'required|exists:rombels,id',
            'tingkatpd' => 'nullable|string|max:100',
            'kurikulum' => 'nullable|string|max:100',
            'walikelas' => 'nullable|string|max:100',
            'ruangan' => 'nullable|string|max:100',
        ]);
    
        Guru::create($validated);
    
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $kelas = Kelas::all();
        $rombels = Rombel::all();
        return view('guru.edit', compact('guru', 'kelas', 'rombels'));
    }
    
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);
    
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50|unique:gurus,nip,'.$guru->id,
            'jabatan' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:20',
            'tenpatlhr' => 'nullable|string|max:100',
            'tgl_lhr' => 'nullable|date',
            'ibu_kandung' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'jenisgtk' => 'nullable|string|max:100',
            'kelas_id' => 'required|exists:kelas,id',
            'rombel_id' => 'required|exists:rombels,id',
            'tingkatpd' => 'nullable|string|max:100',
            'kurikulum' => 'nullable|string|max:100',
            'walikelas' => 'nullable|string|max:100',
            'ruangan' => 'nullable|string|max:100',
        ]);
    
        $guru->update($validated);
    
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui!');
    }
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus!');
    }    
}