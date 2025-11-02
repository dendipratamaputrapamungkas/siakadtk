<?php
namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use App\Models\Kelas;
use App\Models\Rombel;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Framework\MockObject\Exception;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $kelas;

    public $rombel;

    public $siswa;

    public function __construct()
    {
        $this->kelas  = new Kelas();
        $this->rombel = new Rombel();
        $this->siswa  = new Siswa();
    }

    public function index(Request $request)
    {
        $query = Siswa::query();

        if ($request->filled("q")) {
            $q = $request->input("q");
            $query->where(function ($sub) use ($q) {
                $sub->where("nisn", "like", "%{$q}%")->orWhere(
                    "nama_lengkap",
                    "like",
                    "%{$q}%",
                );
            });
        }

        // order dan paginate
        $siswa = $query
            ->orderBy("nama_lengkap")
            ->paginate(10)
            ->withQueryString();

        return view("siswa.index", compact("siswa"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas  = $this->kelas->getAllData();
        $rombel = $this->rombel->getAllData();

        return view("siswa.create", compact("kelas", "rombel"));
    }

    public function export()
    {
        return Excel::download(new SiswaExport(), "data_siswa.xlsx");
    }
    public function exportPdf()
    {
        $siswas = \App\Models\Siswa::all();

        $pdf = Pdf::loadView("siswa.pdf", compact("siswas"))->setPaper(
            "a4",
            "portrait",
        );

        return $pdf->download("data_siswa.pdf");
    }
    public function import(Request $request)
    {
        $request->validate([
            "file" => "required|mimes:xlsx,xls",
        ]);

        Excel::import(new SiswaImport(), $request->file("file"));

        return redirect()
            ->route("siswa.index")
            ->with("success", "Data siswa berhasil diimport!");
    }

    public function getData()
    {
        $siswa = Siswa::select([
            "id",
            'nisn',
            'nama_lengkap',
            'no_kk',
            'tempatlhr',
            'tanggal_lhr',
            'jk',
            'agama',
            'kelas_id',
            'rombel_id',
            'no_indukpd',
            'tgl_masuk',
            'alamat',
            'nama_ayah',
            'nama_ibu',
            'wali',
            'no_hp',
        ]);

        return datatables()
            ->of($siswa)
            ->addColumn("aksi", function ($row) {
                $edit  = route("siswa.edit", $row->id);
                $hapus = route("siswa.destroy", $row->id);
                $show  = route("siswa.show", $row->id);

                return '
                <a href="' . $show . '" class="btn btn-sm btn-info">Lihat</a>
                <a href="' .
                $edit .
                '" class="btn btn-sm btn-warning">Edit</a>
                <form action="' .
                $hapus .
                '" method="POST" style="display:inline-block" onsubmit="return confirm(\'Hapus data?\')">
                    ' .
                csrf_field() .
                method_field("DELETE") .
                    '
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            ';
            })
            ->rawColumns(["aksi"])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                "nisn"         => "required",
                'nama_lengkap' => "required",
                'no_kk'        => "required",
                'tempatlhr'    => "required",
                'tanggal_lhr'  => "required",
                'jk'           => "required",
                'agama'        => "required",
                'kelas_id'     => "required",
                'rombel_id'    => "nullable",
                'no_indukpd'   => "required",
                'tgl_masuk'    => "required",
                'alamat'       => "required",
                'nama_ayah'    => "required",
                'nama_ibu'     => "required",
                'wali'         => "required",
                'no_hp'        => "required",

            ]);

            Siswa::create($data);

            return redirect()
                ->route("siswa.index")
                ->with("success", "Data siswa berhasil ditambahkan");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::with(['kelas', 'rombel'])->findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
    $kelas = Kelas::all();
    $rombel = Rombel::all();
    return view('siswa.edit', compact('siswa', 'kelas', 'rombel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            "nisn"         => "required",
            'nama_lengkap' => "required",
            'no_kk'        => "required",
            'tempatlhr'    => "required",
            'tanggal_lhr'  => "required",
            'jk'           => "required",
            'agama'        => "required",
            'kelas_id'     => "required",
            'rombel_id'    => "required",
            'no_indukpd'   => "required",
            'tgl_masuk'    => "required",
            'alamat'       => "required",
            'nama_ayah'    => "required",
            'nama_ibu'     => "required",
            'wali'         => "required",
            'no_hp'        => "required",
        ]);
    
        $siswa = Siswa::findOrFail($id);
        $siswa->update($data);
    
        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->siswa->destroy($id);
        return to_route("siswa.index")->with("success", "Data siswa berhasil dihapus");
    }
}
