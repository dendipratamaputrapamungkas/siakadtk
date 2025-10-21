<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\SiswaImport;


class SiswaController extends Controller
{
    public function index(Request $request)
{
    $query = Siswa::query();

  
    if ($request->filled('q')) {
        $q = $request->input('q');
        $query->where(function($sub) use ($q) {
            $sub->where('nis', 'like', "%{$q}%")
                ->orWhere('nama_lengkap', 'like', "%{$q}%");
        });
    }

    // order dan paginate
    $siswa = $query->orderBy('nama_lengkap')->paginate(10)->withQueryString();

    return view('siswa.index', compact('siswa'));

    }
    public function create()
{
    return view('siswa.create');
}

public function store(Request $request)
{
    $request->validate([
        'nis' => 'required',
        'nama_lengkap' => 'required',
        'tempatlahir' => 'required',
        'tanggal_lhr' => 'required',
        'jk' => 'required',
        'alamat' => 'required',
        'wali' => 'required',
        'no_hp' => 'required',
    ]);

    Siswa::create($request->all());

    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
}
public function export()
{
    return Excel::download(new SiswaExport, 'data_siswa.xlsx');
}
public function exportPdf()
{
    $siswas = \App\Models\Siswa::all();

    $pdf = Pdf::loadView('siswa.pdf', compact('siswas'))
        ->setPaper('a4', 'portrait');

    return $pdf->download('data_siswa.pdf');
}
public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new SiswaImport, $request->file('file'));

    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diimport!');
}  

public function getData()
{
    $siswa = Siswa::select(['id', 'nis', 'nama_lengkap', 'tempatlahir', 'tanggal_lhr', 'jk', 'wali', 'no_hp']);

    return datatables()
        ->of($siswa)
        ->addColumn('aksi', function ($row) {
            $edit = route('siswa.edit', $row->id);
            $hapus = route('siswa.destroy', $row->id);

            return '
                <a href="'.$edit.'" class="btn btn-sm btn-warning">Edit</a>
                <form action="'.$hapus.'" method="POST" style="display:inline-block" onsubmit="return confirm(\'Hapus data?\')">
                    '.csrf_field().method_field('DELETE').'
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            ';
        })
        ->rawColumns(['aksi'])
        ->make(true);
}



// /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     // $data = Siswa::all();
    //     // return view('siswa.index', compact('data'));
    //     // dd('INDEX JALAN');
    //     return view('siswa.index');
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // // public function create(){}

    // public function create() {}
    // public function store(Request $request) {}
    // public function show(string $id) {}
    // public function edit(string $id) {}
    // public function update(Request $request, string $id) {}
    // public function destroy(string $id) {}
    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
//     public function show(string $id)
//     {
//         //
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
}
