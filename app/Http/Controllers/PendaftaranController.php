<?php

namespace App\Http\Controllers;

use App\Models\Pendaftarans;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    //
    public function create()
    {
        return view('pendaftaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:pendaftaran',
            'no_hp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jk' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required',
            'asal_sekolah' => 'nullable|string',
        ]);

        Pendaftarans::create($request->all());

        return redirect()->route('pendaftaran.success')->with('success', 'Pendaftaran berhasil! Data Anda menunggu verifikasi admin.');
    }

    public function success()
    {
       // return view('pendaftaran.success');
    }

    public function index()
    {
        $pendaftaran = Pendaftaran::orderByDesc('created_at')->get();
        return view('pendaftaran.index', compact('pendaftaran'));
    }

    public function updateStatus($id, Request $request)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update(['status' => $request->status]);

        return back()->with('success', 'Status pendaftaran berhasil diperbarui!');
    }
}
