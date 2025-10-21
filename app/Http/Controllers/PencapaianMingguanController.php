<?php

namespace App\Http\Controllers;

use App\Models\PencapaianMingguan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PencapaianMingguanController extends Controller
{
    public function index()
    {
        $data = PencapaianMingguan::with('siswa')->get();
        return view('pencapaian.index', compact('data'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        return view('pencapaian.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'minggu_ke' => 'required',
        ]);

        PencapaianMingguan::create($request->all());
        return redirect()->route('pencapaian.index')->with('success', 'Data pencapaian mingguan berhasil disimpan.');
    }

    public function destroy($id)
    {
        PencapaianMingguan::findOrFail($id)->delete();
        return redirect()->route('pencapaian.index')->with('success', 'Data berhasil dihapus.');
    }
}

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class PencapaianMingguanController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
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
// }
