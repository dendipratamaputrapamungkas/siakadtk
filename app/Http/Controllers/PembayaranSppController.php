<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\PembayaranSpp;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\PembayaranSppExport;
use Maatwebsite\Excel\Facades\Excel;

class PembayaranSppController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PembayaranSpp::with('siswa')->latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nama_siswa', function ($row) {
                    return $row->siswa ? $row->siswa->nama_lengkap : '-';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('spp.edit', $row->id);
                    $deleteUrl = route('spp.destroy', $row->id);

                    return '
                        <a href="'.$editUrl.'" class="btn btn-sm btn-warning">Edit</a>
                        <form action="'.$deleteUrl.'" method="POST" style="display:inline-block;">
                            '.csrf_field().method_field('DELETE').'
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin ingin hapus?\')">Hapus</button>
                        </form>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('spp.index');
    }

    public function create()
    {
        $siswas = Siswa::orderBy('nama_lengkap')->get();
        return view('spp.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'tanggal_bayar' => 'nullable|date',
            'status' => 'required|in:Lunas,Belum Lunas',
        ]);

        PembayaranSpp::create($request->all());
        return redirect()->route('spp.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pembayaran = PembayaranSpp::findOrFail($id);
        $siswas = Siswa::orderBy('nama_lengkap')->get();
        return view('spp.edit', compact('pembayaran', 'siswas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'tanggal_bayar' => 'nullable|date',
            'status' => 'required|in:Lunas,Belum Lunas',
        ]);

        $pembayaran = PembayaranSpp::findOrFail($id);
        $pembayaran->update($request->all());

        return redirect()->route('spp.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        PembayaranSpp::findOrFail($id)->delete();
        return redirect()->route('spp.index')->with('success', 'Data berhasil dihapus!');
    }
    public function exportExcel()
    {
        return Excel::download(new PembayaranSppExport, 'data_pembayaran_spp.xlsx');
    }
}

// class PembayaranSppController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//         $data = PembayaranSpp::with('siswa')->get();
//         return view('spp.index',compact('data'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//         $siswa = Siswa::all();
//         return view('spp.create', compact('siswa'));
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//         $request->validate([
//             'siswa_id' => 'required',
//             'bulan' => 'required',
//             'tahun' => 'required',
//             'jumlah' => 'required|numeric',
//         ]);

//         PembayaranSpp::create($request->all());
//         return redirect()->route('spp.index')->with('success', 'Data pembayaran berhasil ditambahkan.');
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//         PembayaranSpp::findOrFail($id)->delete();
//         return redirect()->route('spp.index')->with('success', 'Data pembayaran berhasil dihapus.');
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         //
//     }
// }
