<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use SoftDeletes;
use App\Models\BayarPinjaman;
use Illuminate\Support\Facades\DB;

class BayarPinjamanController extends Controller
{
    public function index(Request $request)
    {
        $query = BayarPinjaman::query()->latest();

        // Get search keyword and 'nik' from the request
        $keyword = $request->input('search');
        $nikKeyword = $request->input('search');

        // If a search keyword is provided, filter results based on 'nama'
        if ($keyword) {
            $bayar_pinjaman = $query->whereHas('pinjamans.anggotas', function ($query) use ($keyword) {
                $query->where('nama', 'LIKE', '%' . $keyword . '%');
            });
        }

        // If 'nik' keyword is provided, filter results based on 'nik'
        if ($nikKeyword) {
            $bayar_pinjaman = $query->orWhereHas('pinjamans.anggotas', function ($query) use ($nikKeyword) {
                $query->where('nik', 'LIKE', '%' . $nikKeyword . '%');
            });
        }

        // Get the results
        $bayar_pinjaman = $query->get();

        $pinjamans = Pinjaman::all();

    return view('bayarpinjaman.pinjaman_bayar', compact('bayar_pinjaman', 'pinjamans'));
        // $query = BayarPinjaman::query();
        // $keyword = $request->input('search');
        
        // $bayar_pinjaman = BayarPinjaman::where('nama', 'LIKE', '%' . $keyword . '%')->get();
        // // $bayar_pinjaman = BayarPinjaman::all();
        // $pinjamans = Pinjaman::all();
        // return view('bayarpinjaman.pinjaman_bayar', compact('bayar_pinjaman', 'pinjamans'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $bayar_pinjaman = BayarPinjaman::where('nama', 'LIKE', '%' . $keyword . '%')->get();
        $pinjamans = Pinjaman::all();
        return view('bayarpinjaman.pinjaman_bayar', compact('bayar_pinjaman', 'pinjamans'));
    }

    public function bayar($id)
    {
        $bayar_pinjaman = BayarPinjaman::with(['pinjamans'])->find($id);
        $pinjamans = Pinjaman::all();
        $anggotas = Anggota::all();
        
        return view('bayarpinjaman.bayar', compact('pinjamans', 'anggotas', 'bayar_pinjaman'));
    }

    public function tagihan(Request $request, $id)
    {
        // $bayar_pinjaman = BayarPinjaman::find($id);
        // $bayar_pinjaman->withArchived();

        $request->validate([
            'tanggal_bayar' => 'required|date',
            'status' => 'required|in:sudah_bayar,menunggak',
            // Add other validation rules as needed
        ]);
        
    
        DB::table('bayar_pinjaman')->where('id', $id)->update([
            'tanggal_bayar' => $request->tanggal_bayar,
            'status' => $request->status,
            // Add other fields to update as needed
        ]);
    
        return redirect('/bayar-pinjaman');
    }

    public function hapus($id)
    {
        $bayarPinjaman = BayarPinjaman::findOrFail($id);
        $bayarPinjaman->delete();

        return redirect('/bayar-pinjaman');
    }


}
