<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Simpanan;
use Illuminate\Http\Request;
use App\Models\JenisSimpanan;
use Illuminate\Support\Facades\Auth;

class SimpananController extends Controller
{
    public function index(Request $request)
    {
        $query = Simpanan::query()->latest();

    // Get search keyword from the request
        $keyword = $request->input('search');

        // If a search keyword is provided, filter results based on 'nama', 'jenis simpanan', and 'nik'
        if ($keyword) {
            $simpanans = $query->whereHas('anggotas', function ($query) use ($keyword) {
                    $query->where('nama', 'LIKE', '%' . $keyword . '%');
                })
                ->orWhereHas('jenissimpanans', function ($query) use ($keyword) {
                    $query->where('nama_simpanan', 'LIKE', '%' . $keyword . '%');
                })
                ->orWhereHas('anggotas', function ($query) use ($keyword) {
                    $query->where('nik', 'LIKE', '%' . $keyword . '%');
                })
                ->get();
        } else {
            // If no search keyword, get all simpanans
            $simpanans = $query->get();
        }

    return view('simpanan.index', compact('simpanans'));
    }

    public function tambah()
    {
        $anggotas = Anggota::all();
        $jenissimpanans = JenisSimpanan::all();
        return view('simpanan.tambah', compact('anggotas','jenissimpanans'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggotas,id',
            'id_jenis_simpanan' => 'required|exists:jenis_simpanans,id',
            'tgl_simpanan' => 'required',
            'besar_simpanan' => 'required|numeric'
        ]);

        $user = Auth::user();

        $simpanan = new Simpanan($request->all());
        $simpanan->user()->associate($user);
        $simpanan->save();
        // $data = $request->all();
        // Simpanan::create($request->all());

        // dd($data);
        return redirect('/simpanan');
    }

    public function edit($id)
    {
        $simpanans = Simpanan::with(['anggotas', 'jenissimpanans'])->where('id', $id)->first();
        $anggotas = Anggota::all();
        $jenissimpanans = JenisSimpanan::all();

        return view('simpanan.edit', compact('simpanans', 'anggotas', 'jenissimpanans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_jenis_simpanan' => 'required|exists:jenis_simpanans,id',
            'tgl_simpanan' => 'required',
            'besar_simpanan' => 'required|numeric'
        ]);
        
        Simpanan::where('id', $id)->update([
            'id_jenis_simpanan' => $request->id_jenis_simpanan,
            'tgl_simpanan' => $request->tgl_simpanan,
            'besar_simpanan' => $request->besar_simpanan
        ]);

        return redirect('/simpanan');
    }

    public function hapus($id)
    {
        $simpanans = Simpanan::find($id);
        $simpanans->delete();
        return redirect('/simpanan');
    }


}
