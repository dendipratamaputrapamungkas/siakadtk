<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemaRPM;
use App\Models\RppDimensi;
use App\Models\RppTujuan;
use App\Models\RppLangkah;
use App\Models\RppAsesmen;
use DataTables;
use Illuminate\Support\Str;

class TemaRpmController extends Controller
{
    /**
     * Display listing page (blade).
     */
    public function index()
    {
        return view('tema_rpm.index');
    }

    /**
     * DataTables server-side JSON.
     */
    public function data(Request $request)
    {
        $query = TemaRPM::query()->withCount(['dimensi','tujuan']);

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('dimensi_count', function ($row) {
                return $row->dimensi_count;
            })
            ->addColumn('tujuan_count', function ($row) {
                return $row->tujuan_count;
            })
            ->addColumn('tanggal', function ($row) {
                return optional($row->tanggal)->format('Y-m-d');
            })
            ->addColumn('action', function ($row) {
                $show = '<a href="'.route('tema-rpm.show',$row->id).'" class="btn btn-sm btn-info">Show</a>';
                $edit = '<a href="'.route('tema-rpm.edit',$row->id).'" class="btn btn-sm btn-warning">Edit</a>';
                $delete = '<form method="POST" action="'.route('tema-rpm.destroy',$row->id).'" style="display:inline" onsubmit="return confirm(\'Hapus data?\')">'
                    .csrf_field()
                    .method_field('DELETE')
                    .'<button type="submit" class="btn btn-sm btn-danger">Delete</button>'
                    .'</form>';
                return $show . ' ' . $edit . ' ' . $delete;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('tema_rpm.create');
    }

    /**
     * Store new TemaRPM with related records.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kelompok' => 'required|string|max:10',
            'tema' => 'required|string|max:191',
            'tanggal' => 'required|date',
            'dimensi' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'pendahuluan' => 'nullable|string',
            'inti' => 'nullable|string',
            'penutup' => 'nullable|string',
            'asesmen' => 'nullable|string',
        ]);

        \DB::beginTransaction();
        try {
            $rpp = TemaRPM::create([
                'kelompok' => $data['kelompok'],
                'tema' => $data['tema'],
                'tanggal' => $data['tanggal'],
            ]);

            // helper: explode lines to array, trim and remove empties
            $lines = function($text) {
                $arr = [];
                if (!isset($text)) return $arr;
                $text = str_replace(["\r\n","\r"], "\n", $text);
                foreach (explode("\n", trim($text)) as $line) {
                    $line = trim($line);
                    if ($line !== '') $arr[] = $line;
                }
                return $arr;
            };

            // dimensi
            foreach ($lines($data['dimensi'] ?? '') as $d) {
                RppDimensi::create(['rpp_id' => $rpp->id, 'dimensi' => $d]);
            }

            // tujuan
            foreach ($lines($data['tujuan'] ?? '') as $t) {
                RppTujuan::create(['rpp_id' => $rpp->id, 'tujuan' => $t]);
            }

            // langkah: pendahuluan / inti / penutup
            foreach ($lines($data['pendahuluan'] ?? '') as $p) {
                RppLangkah::create(['rpp_id' => $rpp->id, 'tahap' => 'pendahuluan', 'isi' => $p]);
            }
            foreach ($lines($data['inti'] ?? '') as $i) {
                RppLangkah::create(['rpp_id' => $rpp->id, 'tahap' => 'inti', 'isi' => $i]);
            }
            foreach ($lines($data['penutup'] ?? '') as $n) {
                RppLangkah::create(['rpp_id' => $rpp->id, 'tahap' => 'penutup', 'isi' => $n]);
            }

            // asesmen
            foreach ($lines($data['asesmen'] ?? '') as $a) {
                RppAsesmen::create(['rpp_id' => $rpp->id, 'jenis' => $a]);
            }

            \DB::commit();

            return redirect()->route('tema-rpm.index')->with('success','RPP berhasil disimpan.');
        } catch (\Throwable $e) {
            \DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan: '.$e->getMessage()]);
        }
    }

    /**
     * Show single RPP with relations.
     */
    public function show($id)
    {
        $rpp = TemaRPM::with(['dimensi','tujuan','langkah','asesmen'])->findOrFail($id);
        return view('tema_rpm.show', compact('rpp'));
    }

    /**
     * Show edit form.
     */
    public function edit($id)
    {
        $rpp = TemaRPM::with(['dimensi','tujuan','langkah','asesmen'])->findOrFail($id);

        // prepare textarea content
        $dimensi_text = $rpp->dimensi->pluck('dimensi')->implode("\n");
        $tujuan_text = $rpp->tujuan->pluck('tujuan')->implode("\n");

        $pendahuluan_text = $rpp->langkah->where('tahap','pendahuluan')->pluck('isi')->implode("\n");
        $inti_text = $rpp->langkah->where('tahap','inti')->pluck('isi')->implode("\n");
        $penutup_text = $rpp->langkah->where('tahap','penutup')->pluck('isi')->implode("\n");

        $asesmen_text = $rpp->asesmen->pluck('jenis')->implode("\n");

        return view('tema_rpm.edit', compact(
            'rpp','dimensi_text','tujuan_text','pendahuluan_text','inti_text','penutup_text','asesmen_text'
        ));
    }

    /**
     * Update RPP and its related records.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kelompok' => 'required|string|max:10',
            'tema' => 'required|string|max:191',
            'tanggal' => 'required|date',
            'dimensi' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'pendahuluan' => 'nullable|string',
            'inti' => 'nullable|string',
            'penutup' => 'nullable|string',
            'asesmen' => 'nullable|string',
        ]);

        \DB::beginTransaction();
        try {
            $rpp = TemaRPM::findOrFail($id);
            $rpp->update([
                'kelompok' => $data['kelompok'],
                'tema' => $data['tema'],
                'tanggal' => $data['tanggal'],
            ]);

            $lines = function($text) {
                $arr = [];
                if (!isset($text)) return $arr;
                $text = str_replace(["\r\n","\r"], "\n", $text);
                foreach (explode("\n", trim($text)) as $line) {
                    $line = trim($line);
                    if ($line !== '') $arr[] = $line;
                }
                return $arr;
            };

            // REPLACE related data: simplest approach = delete old then insert new
            RppDimensi::where('rpp_id', $rpp->id)->delete();
            foreach ($lines($data['dimensi'] ?? '') as $d) {
                RppDimensi::create(['rpp_id' => $rpp->id, 'dimensi' => $d]);
            }

            RppTujuan::where('rpp_id', $rpp->id)->delete();
            foreach ($lines($data['tujuan'] ?? '') as $t) {
                RppTujuan::create(['rpp_id' => $rpp->id, 'tujuan' => $t]);
            }

            RppLangkah::where('rpp_id', $rpp->id)->delete();
            foreach ($lines($data['pendahuluan'] ?? '') as $p) {
                RppLangkah::create(['rpp_id' => $rpp->id, 'tahap' => 'pendahuluan', 'isi' => $p]);
            }
            foreach ($lines($data['inti'] ?? '') as $i) {
                RppLangkah::create(['rpp_id' => $rpp->id, 'tahap' => 'inti', 'isi' => $i]);
            }
            foreach ($lines($data['penutup'] ?? '') as $n) {
                RppLangkah::create(['rpp_id' => $rpp->id, 'tahap' => 'penutup', 'isi' => $n]);
            }

            RppAsesmen::where('rpp_id', $rpp->id)->delete();
            foreach ($lines($data['asesmen'] ?? '') as $a) {
                RppAsesmen::create(['rpp_id' => $rpp->id, 'jenis' => $a]);
            }

            \DB::commit();
            return redirect()->route('tema-rpm.index')->with('success','RPP berhasil diupdate.');
        } catch (\Throwable $e) {
            \DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan: '.$e->getMessage()]);
        }
    }

    /**
     * Delete RPP and cascade (foreign keys should handle children if configured).
     */
    public function destroy($id)
    {
        $rpp = TemaRPM::findOrFail($id);
        $rpp->delete();
        return redirect()->route('tema-rpm.index')->with('success','RPP berhasil dihapus.');
    }
}
